<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateLicenseResource\Pages;
use App\Filament\Resources\CertificateLicenseResource\RelationManagers;
use App\Models\CertificateLicense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateLicenseResource extends Resource
{
    protected static ?string $model = CertificateLicense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';
    protected static ?string $navigationLabel = 'Certificates/Licenses';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(CertificateLicense::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable(),

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
            'index' => Pages\ListCertificateLicenses::route('/'),
            'create' => Pages\CreateCertificateLicense::route('/create'),
            'edit' => Pages\EditCertificateLicense::route('/{record}/edit'),
        ];
    }
}
