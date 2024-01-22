<?php

namespace App\Filament\Resources\PayGradeResource\Pages;

use App\Filament\Resources\PayGradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePayGrades extends ManageRecords
{
    protected static string $resource = PayGradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
