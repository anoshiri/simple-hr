<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;


class Training extends Model
{
    use HasFactory;

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
