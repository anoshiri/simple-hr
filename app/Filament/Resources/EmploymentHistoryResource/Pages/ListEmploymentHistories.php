<?php

namespace App\Filament\Resources\EmploymentHistoryResource\Pages;

use App\Filament\Resources\EmploymentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmploymentHistories extends ListRecords
{
    protected static string $resource = EmploymentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
