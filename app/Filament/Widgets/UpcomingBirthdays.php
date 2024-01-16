<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Employee;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingBirthdays extends BaseWidget
{
    protected static ?string $model = Employee::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(Employee::selectRaw('id, first_name, last_name, date_of_birth, if ( month(date_of_birth)>=month(now()), mod(month(date_of_birth), 12), month(date_of_birth)+mod(month(date_of_birth), 12) ) as mnth')
                ->orderBy('mnth')
                ->orderByRaw('day(date_of_birth)')
            )
            ->columns([
                Tables\Columns\TextColumn::make('fullName'),
                Tables\Columns\TextColumn::make('birthday')
                    ->searchable(),
            ]);
    }
}
