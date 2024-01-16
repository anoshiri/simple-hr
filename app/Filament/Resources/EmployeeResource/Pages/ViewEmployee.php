<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use Filament\Actions;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\EmployeeResource;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;

class ViewEmployee extends ViewRecord
{
    use HasPageSidebar; // use this trait to activate the Sidebar

    protected static string $resource = EmployeeResource::class;
}
