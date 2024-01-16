<?php

namespace App\Filament\Resources\EducationalInformationResource\Pages;

use App\Filament\Resources\EducationalInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationalInformation extends ListRecords
{
    protected static string $resource = EducationalInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
