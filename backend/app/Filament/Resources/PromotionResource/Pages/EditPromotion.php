<?php

namespace App\Filament\Resources\PromotionResource\Pages;

use App\Filament\Resources\PromotionResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class EditPromotion extends EditRecord
{
    protected static string $resource = PromotionResource::class;

    /** @param array<string, mixed> $data */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {
            return parent::handleRecordUpdate($record, $data);
        } catch (ValidationException $exception) {
            // Model rules use attribute names; Filament fields live under data.*.
            $errors = [];
            foreach ($exception->errors() as $field => $messages) {
                $errors['data.'.$field] = $messages;
            }
            $mapped = ValidationException::withMessages($errors);
            $this->onValidationError($mapped);
            $this->dispatch('form-validation-error', livewireId: $this->getId());

            throw $mapped;
        }
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title('No se guardó la promoción')
            ->body('Revisa los campos señalados. Para activar la campaña, completa las fechas y aprueba los textos legales.')
            ->danger()
            ->persistent()
            ->send();
    }
}
