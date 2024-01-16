<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title', 'start_date', 'end_date',
    ];



    protected $cast = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

}
