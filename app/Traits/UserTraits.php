<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UserTraits {
    function isOwner(): bool
    {
        return Auth::user()->employee_id == $this->employee_id;
    }
}
