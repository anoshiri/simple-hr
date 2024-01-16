<?php

namespace App\Filament\Resources\BankingInformationResource\Pages;

use App\Filament\Resources\BankingInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBankingInformation extends ListRecords
{
    protected static string $resource = BankingInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
