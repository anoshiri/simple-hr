<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\ProficiencyEnum;
use App\Models\LanguageSpoken;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LanguageSpokenResource\Pages;
use App\Filament\Resources\LanguageSpokenResource\RelationManagers;

class LanguageSpokenResource extends Resource
{
    protected static ?string $model = LanguageSpoken::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'fullName')
                    ->required(),

                Forms\Components\TextInput::make('language_name')
                    ->required(),

                Forms\Components\Select::make('proficiency_level')
                    ->options(ProficiencyEnum::valuePairs())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(['first_name', 'last_name']),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLanguageSpokens::route('/'),
        ];
    }
}
