<?php

namespace App\Filament\Resources\IdentificationDocumentResource\Pages;

use App\Filament\Resources\IdentificationDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIdentificationDocuments extends ListRecords
{
    protected static string $resource = IdentificationDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
