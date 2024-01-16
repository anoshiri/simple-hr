<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdentificationDocumentResource\Pages;
use App\Filament\Resources\IdentificationDocumentResource\RelationManagers;
use App\Models\IdentificationDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IdentificationDocumentResource extends Resource
{
    protected static ?string $model = IdentificationDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'fullName')
                    ->required(),

                Forms\Components\TextInput::make('document_type')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('document_number')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('document_path')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(['first_name', 'last_name']),

                Tables\Columns\TextColumn::make('document_type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('document_number')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('document_path')
                    ->sortable()
                    ->searchable(),

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
            'index' => Pages\ListIdentificationDocuments::route('/'),
            'create' => Pages\CreateIdentificationDocument::route('/create'),
            'edit' => Pages\EditIdentificationDocument::route('/{record}/edit'),
        ];
    }
}
