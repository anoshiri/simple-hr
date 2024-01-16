<?php

namespace App\Filament\Resources\BankingInformationResource\Pages;

use App\Filament\Resources\BankingInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankingInformation extends EditRecord
{
    protected static string $resource = BankingInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
