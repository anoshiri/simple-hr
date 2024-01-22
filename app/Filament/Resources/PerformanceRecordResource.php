<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerformanceRecordResource\Pages;
use App\Filament\Resources\PerformanceRecordResource\RelationManagers;
use App\Models\PerformanceRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerformanceRecordResource extends Resource
{
    protected static ?string $model = PerformanceRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(PerformanceRecord::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(['first_name', 'last_name']),

                Tables\Columns\TextColumn::make('appraisal_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('reviewer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('performance_score')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListPerformanceRecords::route('/'),
            'create' => Pages\CreatePerformanceRecord::route('/create'),
            'edit' => Pages\EditPerformanceRecord::route('/{record}/edit'),
        ];
    }
}
