<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\SkillAndInterest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillAndInterestsRelationManager extends RelationManager
{
    protected static string $relationship = 'skillAndInterests';

    public function form(Form $form): Form
    {
        return $form
            ->schema(SkillAndInterest::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('skill_name')
            ->columns([
                Tables\Columns\TextColumn::make('skill_name')
                    ->label('Language')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('proficiency_level')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
