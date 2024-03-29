<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\PerformanceRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PerformanceRecordsRelationManager extends RelationManager
{
    protected static string $relationship = 'performanceRecords';

    public function form(Form $form): Form
    {
        return $form
            ->schema(PerformanceRecord::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('appraisal_date')
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
