<?php

namespace App\Filament\Resources\StateResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\StateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateState extends CreateRecord
{
    protected static string $resource = StateResource::class;

    protected function getCreatedNotification(): ?Notification{
        return Notification::make()
            ->success()
            ->title('State Created.')
            ->body('The state has been created successfully.');
    }
}
