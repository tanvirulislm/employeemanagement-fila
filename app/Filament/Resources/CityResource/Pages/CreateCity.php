<?php

namespace App\Filament\Resources\CityResource\Pages;

use Filament\Actions;
use App\Filament\Resources\CityResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCity extends CreateRecord
{
    protected static string $resource = CityResource::class;

    protected function getCreatedNotification(): ?Notification{
        return Notification::make()
            ->success()
            ->title('City Created.')
            ->body('The city has been created successfully.');
    }
}
