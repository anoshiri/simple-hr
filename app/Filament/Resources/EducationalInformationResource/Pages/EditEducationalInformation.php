<?php

namespace App\Filament\Resources\EducationalInformationResource\Pages;

use App\Filament\Resources\EducationalInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationalInformation extends EditRecord
{
    protected static string $resource = EducationalInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
