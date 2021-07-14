<?php


namespace App\Services;


use App\Models\Department;

class UpdateMaxWage
{
    public function __construct()
    {
        $departments = Department::all();
        foreach ($departments as $department) {
            $department->update(['MaximumEarnings' => $department->employee->max('wage')]);
        }
    }
}
