<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\EmployeeResource;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;



    protected function getCreatedNotification(): ?Notification{
        return Notification::make()
            ->success()
            ->title('Employee Created.')
            ->body('The employee has been created successfully.');
    }
}
