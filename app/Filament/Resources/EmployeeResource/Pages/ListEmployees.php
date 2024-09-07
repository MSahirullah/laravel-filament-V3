<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),

            'This Week' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('date_hired', [now()->startOfWeek(), now()->endOfWeek()]))
                ->badge(Employee::query()->whereBetween('date_hired', [now()->startOfWeek(), now()->endOfWeek()])->count()),


            'This Month' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('date_hired', [now()->startOfMonth(), now()->endOfMonth()]))
                ->badge(Employee::query()->whereBetween('date_hired', [now()->startOfMonth(), now()->endOfMonth()])->count()),


            'This Year' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->whereBetween('date_hired', [now()->startOfYear(), now()->endOfYear()]))
                ->badge(Employee::query()->whereBetween('date_hired', [now()->startOfYear(), now()->endOfYear()])->count()),
        ];
    }
}
