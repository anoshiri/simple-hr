<?php

namespace App\Filament\Resources\LanguageSpokenResource\Pages;

use App\Filament\Resources\LanguageSpokenResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLanguageSpokens extends ManageRecords
{
    protected static string $resource = LanguageSpokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
