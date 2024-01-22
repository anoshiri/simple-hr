<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Enums\ProficiencyEnum;
use App\Models\LanguageSpoken;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LanguageSpokensRelationManager extends RelationManager
{
    protected static string $relationship = 'languageSpokens';

    public function form(Form $form): Form
    {
        return $form
            ->schema(LanguageSpoken::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('language_name')
            ->columns([

                Tables\Columns\TextColumn::make('language_name')
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
