<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

use App\Models\CertificateLicense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateLicensesRelationManager extends RelationManager
{
    protected static string $relationship = 'certificateLicenses';

    public function form(Form $form): Form
    {
        return $form
            ->schema(CertificateLicense::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('certificate_name')
            ->columns([
                Tables\Columns\TextColumn::make('certification_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('issuing_organisation_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('issuance_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('expiry_date')
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
