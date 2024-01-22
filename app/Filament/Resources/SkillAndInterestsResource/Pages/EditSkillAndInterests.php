<?php

namespace App\Filament\Resources\SkillAndInterestsResource\Pages;

use App\Filament\Resources\SkillAndInterestsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkillAndInterests extends EditRecord
{
    protected static string $resource = SkillAndInterestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
