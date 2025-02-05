<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Employee Created';
    }

    protected function getCreatedNotification(): ?Notification
    {
        // return null;
        return Notification::make()->title('Employee Created')->success()->body('The employee was created successfully!');
    }
}
