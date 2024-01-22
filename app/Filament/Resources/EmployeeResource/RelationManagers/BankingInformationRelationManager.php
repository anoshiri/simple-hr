<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\BankingInformation;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BankingInformationRelationManager extends RelationManager
{
    protected static string $relationship = 'bankingInformation';

    public function form(Form $form): Form
    {
        return $form
            ->schema(BankingInformation::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('account_name')
            ->columns([
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bank_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('routing_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_type')
                    ->searchable(),

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
