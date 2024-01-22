<?php

namespace App\Filament\Resources\SkillAndInterestsResource\Pages;

use App\Filament\Resources\SkillAndInterestsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillAndInterests extends ListRecords
{
    protected static string $resource = SkillAndInterestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
