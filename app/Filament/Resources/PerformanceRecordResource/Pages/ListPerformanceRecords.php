<?php

namespace App\Filament\Resources\PerformanceRecordResource\Pages;

use App\Filament\Resources\PerformanceRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerformanceRecords extends ListRecords
{
    protected static string $resource = PerformanceRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
