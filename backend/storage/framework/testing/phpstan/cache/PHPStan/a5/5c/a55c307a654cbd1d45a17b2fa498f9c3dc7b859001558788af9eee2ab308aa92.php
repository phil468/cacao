<?php declare(strict_types = 1);

// odsl-C:\projects\cacao\backend\app\Models\DeliveryRate.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\DeliveryRate
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.32-7ab42eacd659322cda5c8c6d3c354c7e70e50808d61138a6f3cc45086bea06db',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\DeliveryRate',
        'filename' => 'C:/projects/cacao/backend/app/Models/DeliveryRate.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\DeliveryRate',
    'shortName' => 'DeliveryRate',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $delivery_zone_id
 * @property int $amount
 * @property int|null $free_from_amount
 * @property bool $is_active
 * @property-read DeliveryZone $deliveryZone
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 16,
    'endLine' => 25,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'guarded' => 
      array (
        'declaringClassName' => 'App\\Models\\DeliveryRate',
        'implementingClassName' => 'App\\Models\\DeliveryRate',
        'name' => 'guarded',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 18,
            'endLine' => 18,
            'startTokenPos' => 35,
            'startFilePos' => 388,
            'endTokenPos' => 36,
            'endFilePos' => 389,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 18,
        'endLine' => 18,
        'startColumn' => 5,
        'endColumn' => 28,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      'deliveryZone' => 
      array (
        'name' => 'deliveryZone',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/** @return BelongsTo<DeliveryZone, $this> */',
        'startLine' => 21,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\DeliveryRate',
        'implementingClassName' => 'App\\Models\\DeliveryRate',
        'currentClassName' => 'App\\Models\\DeliveryRate',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));