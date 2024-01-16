<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationalInformationResource\Pages;
use App\Filament\Resources\EducationalInformationResource\RelationManagers;
use App\Models\EducationalInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationalInformationResource extends Resource
{
    protected static ?string $model = EducationalInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'first_name')
                    ->required(),

                Forms\Components\TextInput::make('degree')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('major')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('admission_date')
                    ->required(),

                Forms\Components\DatePicker::make('graduation_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(),

                Tables\Columns\TextColumn::make('degree')
                    ->searchable(),

                Tables\Columns\TextColumn::make('major')
                    ->searchable(),

                Tables\Columns\TextColumn::make('institution')
                    ->searchable(),

                Tables\Columns\TextColumn::make('admission_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('graduation_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListEducationalInformation::route('/'),
            'create' => Pages\CreateEducationalInformation::route('/create'),
            'edit' => Pages\EditEducationalInformation::route('/{record}/edit'),
        ];
    }
}
