<?php

namespace App\Support;

use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Throwable;

class FilamentSaveAlert
{
    public static function notifyAndThrow(Throwable $exception): never
    {
        Notification::make()
            ->danger()
            ->title('No se pudo guardar el registro')
            ->body(self::message($exception))
            ->send();

        throw $exception;
    }

    protected static function message(Throwable $exception): string
    {
        if ($exception instanceof ValidationException) {
            $messages = collect($exception->errors())
                ->flatten()
                ->filter()
                ->values();

            if ($messages->isNotEmpty()) {
                return $messages->implode(' ');
            }
        }

        return filled($exception->getMessage())
            ? $exception->getMessage()
            : 'Ocurrio un error inesperado al guardar.';
    }
}
