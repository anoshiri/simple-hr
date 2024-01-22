<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillAndInterestsResource\Pages;
use App\Filament\Resources\SkillAndInterestsResource\RelationManagers;
use App\Models\SkillAndInterest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillAndInterestsResource extends Resource
{
    protected static ?string $model = SkillAndInterest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(SkillAndInterest::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(['first_name', 'last_name']),

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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkillAndInterests::route('/'),
            'create' => Pages\CreateSkillAndInterests::route('/create'),
            'edit' => Pages\EditSkillAndInterests::route('/{record}/edit'),
        ];
    }
}
