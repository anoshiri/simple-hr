<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Award extends Model
{
    use HasFactory;


    protected $fillable = [ 
        'title', 'description', 'award_date', 'awarded_by',
    ];

    protected $casts = [
        'award_date' => 'date'
    ];



    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
