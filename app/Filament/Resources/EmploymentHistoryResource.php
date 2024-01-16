<?php

namespace App\Filament\Resources;

use App\Enums\EmploymentTypeEnum;
use App\Filament\Resources\EmploymentHistoryResource\Pages;
use App\Filament\Resources\EmploymentHistoryResource\RelationManagers;
use App\Models\EmploymentHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmploymentHistoryResource extends Resource
{
    protected static ?string $model = EmploymentHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'first_name')
                    ->required(),

                Forms\Components\Select::make('employment_type')
                    ->required()
                    ->options(EmploymentTypeEnum::values()),

                Forms\Components\TextInput::make('job_title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('work_location')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('hire_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullName')
                    ->sortable()
                    ->searchable(['first_name', 'last_name']),

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
            'index' => Pages\ListEmploymentHistories::route('/'),
            'create' => Pages\CreateEmploymentHistory::route('/create'),
            'edit' => Pages\EditEmploymentHistory::route('/{record}/edit'),
        ];
    }
}
