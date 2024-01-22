<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\EducationalInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationalInformationRelationManager extends RelationManager
{
    protected static string $relationship = 'educationalInformation';

    public function form(Form $form): Form
    {
        return $form
            ->schema(EducationalInformation::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('degree')
            ->columns([
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
