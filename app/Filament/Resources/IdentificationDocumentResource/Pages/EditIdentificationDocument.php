<?php

namespace App\Filament\Resources\IdentificationDocumentResource\Pages;

use App\Filament\Resources\IdentificationDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIdentificationDocument extends EditRecord
{
    protected static string $resource = IdentificationDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
