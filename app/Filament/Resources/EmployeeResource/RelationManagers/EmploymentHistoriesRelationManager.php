<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\EmploymentHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmploymentHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'employmentHistories';

    public function form(Form $form): Form
    {
        return $form
            ->schema(EmploymentHistory::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('job_title')
            ->columns([
                Tables\Columns\TextColumn::make('job_title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('employment_type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('work_location')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('hire_date')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->sortable(),
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
