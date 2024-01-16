<?php

namespace App\Actions;

use App\Models\Department;

class DepartmentList {
    public function __invoke() {
        $departments = Department::isActive()->pluck('title', 'id');
    }
}
