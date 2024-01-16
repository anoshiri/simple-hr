<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'to', 'subject', 'message',
    ];

    public function sender() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
