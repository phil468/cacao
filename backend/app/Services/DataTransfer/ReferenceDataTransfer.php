<?php

namespace App\Services\DataTransfer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

/**
 * @phpstan-type Row array<string, mixed>
 * @phpstan-type Rows list<Row>
 * @phpstan-type IdMap array<int, int>
 * @phpstan-type CountMap array<string, int>
 * @phpstan-type AssetReport array{exported: list<string>, missing: list<string>}
 * @phpstan-type Payload array{
 *     format_version: int,
 *     generated_at?: mixed,
 *     source_environment?: mixed,
 *     includes_stock?: mixed,
 *     excluded_data?: mixed,
 *     data: array<string, Rows>
 * }
 */
class ReferenceDataTransfer
{
    private const FORMAT_VERSION = 1;

    private const SIMPLE_TABLES = [
        'payment_methods' => 'code',
        'coupons' => 'code',
        'order_statuses' => 'code',
        'banners' => ['title', 'image_path'],
        'faqs' => 'question',
        'business_settings' => 'key',
        'permissions' => ['name', 'guard_name'],
        'roles' => ['name', 'guard_name'],
    ];

    /**
     * @return array{directory: string, row_counts: CountMap, assets: AssetReport, includes_stock: bool}
     */
    public function export(string $directory, bool $includeStock = false): array
    {
        $directory = rtrim($directory, DIRECTORY_SEPARATOR);
        File::ensureDirectoryExists($directory);

        $payload = [
            'format_version' => self::FORMAT_VERSION,
            'generated_at' => now()->toIso8601String(),
            'source_environment' => app()->environment(),
            'includes_stock' => $includeStock,
            'excluded_data' => [
                'users', 'addresses', 'personal_access_tokens', 'sessions',
                'carts', 'cart_items', 'orders', 'order_items',
                'order_status_histories', 'order_returns', 'order_return_items',
                'inventory_movements', 'contact_requests', 'push_devices',
                'push_campaigns', 'notification_deliveries', 'jobs', 'failed_jobs',
                'cache', 'cache_locks', 'model_has_permissions', 'model_has_roles',
            ],
            'data' => [
                'categories' => DB::table('categories')->orderBy('id')->get()->map(fn ($row) => (array) $row)->all(),
                'products' => DB::table('products')->orderBy('id')->get()->map(fn ($row) => (array) $row)->all(),
                'product_variants' => DB::table('product_variants')->orderBy('id')->get()->map(function ($row) use ($includeStock): array {
                    $variant = (array) $row;
                    if (! $includeStock) {
                        unset($variant['stock']);
                    }

                    return $variant;
                })->all(),
                'product_images' => DB::table('product_images')->orderBy('id')->get()->map(fn ($row) => (array) $row)->all(),
                'delivery_zones' => DB::table('delivery_zones')->orderBy('id')->get()->map(fn ($row) => (array) $row)->all(),
                'delivery_rates' => DB::table('delivery_rates')->orderBy('id')->get()->map(fn ($row) => (array) $row)->all(),
                'role_has_permissions' => DB::table('role_has_permissions')->orderBy('role_id')->orderBy('permission_id')->get()->map(fn ($row) => (array) $row)->all(),
            ],
        ];

        foreach (array_keys(self::SIMPLE_TABLES) as $table) {
            $rows = DB::table($table)->orderBy('id')->get()->map(fn ($row) => (array) $row)->all();
            if ($table === 'coupons') {
                $rows = array_map(function (array $coupon): array {
                    $coupon['usage_count'] = 0;

                    return $coupon;
                }, $rows);
            }
            $payload['data'][$table] = $rows;
        }

        File::put(
            $directory.DIRECTORY_SEPARATOR.'reference-data.json',
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR)
        );

        $assets = $this->exportAssets($payload['data'], $directory);
        File::put(
            $directory.DIRECTORY_SEPARATOR.'manifest.json',
            json_encode([
                'format_version' => self::FORMAT_VERSION,
                'generated_at' => $payload['generated_at'],
                'includes_stock' => $includeStock,
                'row_counts' => array_map('count', $payload['data']),
                'assets' => $assets,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR)
        );

        return [
            'directory' => $directory,
            'row_counts' => array_map('count', $payload['data']),
            'assets' => $assets,
            'includes_stock' => $includeStock,
        ];
    }

    /**
     * @return array{
     *     generated_at: mixed,
     *     source_environment: mixed,
     *     includes_stock: bool,
     *     row_counts: CountMap,
     *     excluded_data: list<string>
     * }
     */
    public function inspect(string $directory): array
    {
        $payload = $this->readPayload($directory);

        return [
            'generated_at' => $payload['generated_at'] ?? null,
            'source_environment' => $payload['source_environment'] ?? null,
            'includes_stock' => (bool) ($payload['includes_stock'] ?? false),
            'row_counts' => array_map('count', $payload['data']),
            'excluded_data' => $payload['excluded_data'] ?? [],
        ];
    }

    /**
     * @return array{row_counts: CountMap, includes_stock: bool}
     */
    public function import(string $directory): array
    {
        $payload = $this->readPayload($directory);
        $data = $payload['data'];
        $includesStock = (bool) ($payload['includes_stock'] ?? false);

        return DB::transaction(function () use ($data, $directory, $includesStock): array {
            $counts = [];
            $categoryIds = $this->importCategories($data['categories'] ?? []);
            $counts['categories'] = count($categoryIds);
            $productIds = $this->importProducts($data['products'] ?? [], $categoryIds);
            $counts['products'] = count($productIds);
            $variantIds = $this->importVariants($data['product_variants'] ?? [], $productIds, $includesStock);
            $counts['product_variants'] = count($variantIds);
            $counts['product_images'] = $this->importImages($data['product_images'] ?? [], $productIds, $variantIds);
            $zoneIds = $this->importZones($data['delivery_zones'] ?? []);
            $counts['delivery_zones'] = count($zoneIds);
            $counts['delivery_rates'] = $this->importRates($data['delivery_rates'] ?? [], $zoneIds);

            foreach (self::SIMPLE_TABLES as $table => $key) {
                $counts[$table] = $this->upsertRows($table, $data[$table] ?? [], (array) $key);
            }

            $counts['role_has_permissions'] = $this->importRolePermissions($data);
            $counts['assets'] = $this->importAssets($directory);

            return [
                'row_counts' => $counts,
                'includes_stock' => $includesStock,
            ];
        });
    }

    /**
     * @param  Rows  $rows
     * @return IdMap
     */
    private function importCategories(array $rows): array
    {
        $ids = [];
        foreach ($rows as $row) {
            $sourceId = $row['id'];
            $attributes = $this->without($row, ['id', 'parent_id']);
            DB::table('categories')->updateOrInsert(['slug' => $row['slug']], $attributes);
            $ids[$sourceId] = DB::table('categories')->where('slug', $row['slug'])->value('id');
        }
        foreach ($rows as $row) {
            DB::table('categories')->where('id', $ids[$row['id']])->update([
                'parent_id' => isset($row['parent_id']) ? ($ids[$row['parent_id']] ?? null) : null,
            ]);
        }

        return $ids;
    }

    /**
     * @param  Rows  $rows
     * @param  IdMap  $categoryIds
     * @return IdMap
     */
    private function importProducts(array $rows, array $categoryIds): array
    {
        $ids = [];
        foreach ($rows as $row) {
            $sourceId = $row['id'];
            $attributes = $this->without($row, ['id', 'category_id']);
            $attributes['category_id'] = isset($row['category_id']) ? ($categoryIds[$row['category_id']] ?? null) : null;
            DB::table('products')->updateOrInsert(['slug' => $row['slug']], $attributes);
            $ids[$sourceId] = DB::table('products')->where('slug', $row['slug'])->value('id');
        }

        return $ids;
    }

    /**
     * @param  Rows  $rows
     * @param  IdMap  $productIds
     * @return IdMap
     */
    private function importVariants(array $rows, array $productIds, bool $includesStock): array
    {
        $ids = [];
        foreach ($rows as $row) {
            $sourceId = $row['id'];
            $attributes = $this->without($row, ['id', 'product_id']);
            $attributes['product_id'] = $productIds[$row['product_id']] ?? throw new RuntimeException("Missing product mapping for variant {$row['sku']}.");
            if (! $includesStock) {
                unset($attributes['stock']);
            }
            DB::table('product_variants')->updateOrInsert(['sku' => $row['sku']], $attributes);
            $ids[$sourceId] = DB::table('product_variants')->where('sku', $row['sku'])->value('id');
        }

        return $ids;
    }

    /**
     * @param  Rows  $rows
     * @param  IdMap  $productIds
     * @param  IdMap  $variantIds
     */
    private function importImages(array $rows, array $productIds, array $variantIds): int
    {
        foreach ($rows as $row) {
            $attributes = $this->without($row, ['id', 'product_id', 'product_variant_id']);
            $attributes['product_id'] = $productIds[$row['product_id']] ?? throw new RuntimeException("Missing product mapping for image {$row['path']}.");
            $attributes['product_variant_id'] = isset($row['product_variant_id']) ? ($variantIds[$row['product_variant_id']] ?? null) : null;
            DB::table('product_images')->updateOrInsert([
                'product_id' => $attributes['product_id'],
                'product_variant_id' => $attributes['product_variant_id'],
                'path' => $row['path'],
            ], $attributes);
        }

        return count($rows);
    }

    /**
     * @param  Rows  $rows
     * @return IdMap
     */
    private function importZones(array $rows): array
    {
        $ids = [];
        foreach ($rows as $row) {
            $sourceId = $row['id'];
            DB::table('delivery_zones')->updateOrInsert(['name' => $row['name']], $this->without($row, ['id']));
            $ids[$sourceId] = DB::table('delivery_zones')->where('name', $row['name'])->value('id');
        }

        return $ids;
    }

    /**
     * @param  Rows  $rows
     * @param  IdMap  $zoneIds
     */
    private function importRates(array $rows, array $zoneIds): int
    {
        foreach ($rows as $row) {
            $zoneId = $zoneIds[$row['delivery_zone_id']] ?? throw new RuntimeException('Missing delivery zone mapping.');
            $attributes = $this->without($row, ['id', 'delivery_zone_id']);
            $attributes['delivery_zone_id'] = $zoneId;
            DB::table('delivery_rates')->updateOrInsert(['delivery_zone_id' => $zoneId], $attributes);
        }

        return count($rows);
    }

    /**
     * @param  Rows  $rows
     * @param  list<string>  $keys
     */
    private function upsertRows(string $table, array $rows, array $keys): int
    {
        foreach ($rows as $row) {
            $identity = [];
            foreach ($keys as $key) {
                $identity[$key] = $row[$key];
            }
            DB::table($table)->updateOrInsert($identity, $this->without($row, ['id']));
        }

        return count($rows);
    }

    /**
     * @param  array<string, Rows>  $data
     */
    private function importRolePermissions(array $data): int
    {
        $permissionIds = collect($data['permissions'] ?? [])->mapWithKeys(fn (array $row) => [
            $row['id'] => DB::table('permissions')->where(['name' => $row['name'], 'guard_name' => $row['guard_name']])->value('id'),
        ]);
        $roleIds = collect($data['roles'] ?? [])->mapWithKeys(fn (array $row) => [
            $row['id'] => DB::table('roles')->where(['name' => $row['name'], 'guard_name' => $row['guard_name']])->value('id'),
        ]);

        foreach ($data['role_has_permissions'] ?? [] as $row) {
            $roleId = $roleIds[$row['role_id']] ?? null;
            $permissionId = $permissionIds[$row['permission_id']] ?? null;
            if ($roleId && $permissionId) {
                DB::table('role_has_permissions')->updateOrInsert([
                    'role_id' => $roleId,
                    'permission_id' => $permissionId,
                ]);
            }
        }

        return count($data['role_has_permissions'] ?? []);
    }

    /**
     * @param  array<string, Rows>  $data
     * @return AssetReport
     */
    private function exportAssets(array $data, string $directory): array
    {
        $paths = collect($data['product_images'] ?? [])->pluck('path')
            ->merge(collect($data['banners'] ?? [])->pluck('image_path'))
            ->merge(collect($data['payment_methods'] ?? [])->pluck('image_path'))
            ->filter(fn ($path) => is_string($path) && $path !== '')
            ->unique()
            ->values();
        $exported = [];
        $missing = [];

        foreach ($paths as $path) {
            if (! Storage::disk('public')->exists($path)) {
                $missing[] = $path;

                continue;
            }
            $target = $directory.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $path);
            File::ensureDirectoryExists(dirname($target));
            File::copy(Storage::disk('public')->path($path), $target);
            $exported[] = $path;
        }

        return ['exported' => $exported, 'missing' => $missing];
    }

    private function importAssets(string $directory): int
    {
        $root = rtrim($directory, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'public';
        if (! File::isDirectory($root)) {
            return 0;
        }

        $count = 0;
        foreach (File::allFiles($root) as $file) {
            $relative = str_replace(DIRECTORY_SEPARATOR, '/', $file->getRelativePathname());
            Storage::disk('public')->put($relative, File::get($file->getPathname()));
            $count++;
        }

        return $count;
    }

    /**
     * @return Payload
     */
    private function readPayload(string $directory): array
    {
        $path = rtrim($directory, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'reference-data.json';
        if (! File::isFile($path)) {
            throw new RuntimeException("Transfer file not found: {$path}");
        }
        $payload = json_decode(File::get($path), true, flags: JSON_THROW_ON_ERROR);
        if (($payload['format_version'] ?? null) !== self::FORMAT_VERSION || ! is_array($payload['data'] ?? null)) {
            throw new RuntimeException('Unsupported or invalid reference-data package.');
        }

        return $payload;
    }

    /**
     * @param  Row  $row
     * @param  list<string>  $keys
     * @return Row
     */
    private function without(array $row, array $keys): array
    {
        foreach ($keys as $key) {
            unset($row[$key]);
        }

        return $row;
    }
}
