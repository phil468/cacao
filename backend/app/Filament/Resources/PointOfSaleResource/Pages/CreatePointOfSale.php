<?php

namespace App\Filament\Resources\PointOfSaleResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\PointOfSaleResource;
use App\Services\PointOfSaleService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class CreatePointOfSale extends CreateRecord
{
    protected static string $resource = PointOfSaleResource::class;

    protected static bool $canCreateAnother = false;

    protected function handleRecordCreation(array $data): Model
    {
        try {
            return app(PointOfSaleService::class)->sell($data, auth()->user());
        } catch (ConflictHttpException $exception) {
            throw ValidationException::withMessages(['data.items' => $exception->getMessage()]);
        } catch (ValidationException $exception) {
            $errors = [];
            foreach ($exception->errors() as $key => $messages) {
                $errors['data.'.$key] = $messages;
            }
            throw ValidationException::withMessages($errors);
        }
    }

    protected function getRedirectUrl(): string
    {
        return OrderResource::getUrl('edit', ['record' => $this->record]);
    }
}
