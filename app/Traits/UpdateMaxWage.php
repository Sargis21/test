<?php


namespace App\Traits;


use App\Models\Department;

trait UpdateMaxWage
{
    public function runMaxWage()
    {
        $departments = Department::all();
        foreach ($departments as $department) {
            $department->update(['MaximumEarnings' => $department->employee->max('wage')]);
        }
    }
}
