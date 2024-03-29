<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'HR';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema(Employee::getForm());
    }


    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with([
                'contacts' => function($query) {
                    $query->latest();
                },
                'photographs' => function($query) {
                    $query->latest();
                }
            ]))
            ->columns([
                Tables\Columns\ImageColumn::make('photographs.image')
                    ->label('Photo')
                    ->rounded()
                    ->defaultImageurl(function(Employee $record) {
                        return 'https://ui-avatars.com/api/?name='. $record->first_name;
                    }),

                Tables\Columns\TextColumn::make('fullName')
                    ->sortable(['last_name', 'first_name'])
                    ->searchable(['last_name', 'first_name']),

                Tables\Columns\TextColumn::make('designation')
                    ->sortable('designation')
                    ->searchable('designation'),

                Tables\Columns\TextColumn::make('contacts.work_email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('contacts.work_phone')
                    ->label('Phone')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('birthday')
                    ->sortable()
                    ->searchable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AwardsRelationManager::class,
            RelationManagers\BankingInformationRelationManager::class,
            RelationManagers\ContactsRelationManager::class,
            RelationManagers\EmploymentHistoriesRelationManager::class,
            RelationManagers\EducationalInformationRelationManager::class,
            RelationManagers\LanguageSpokensRelationManager::class,
            RelationManagers\PerformanceRecordsRelationManager::class,
            RelationManagers\SkillAndInterestsRelationManager::class,
            RelationManagers\TrainingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
