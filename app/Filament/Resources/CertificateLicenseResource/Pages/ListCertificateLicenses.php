<?php

namespace App\Filament\Resources\CertificateLicenseResource\Pages;

use App\Filament\Resources\CertificateLicenseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificateLicenses extends ListRecords
{
    protected static string $resource = CertificateLicenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
