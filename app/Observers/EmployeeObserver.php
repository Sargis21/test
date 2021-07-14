<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Client\Request;
use App\Traits\UpdateMaxWage;

class EmployeeObserver
{
    use UpdateMaxWage;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        $employee->department()->attach(request()->get('department'));
        $this->runMaxWage();
        $employee->department()->increment('employeeCount');
    }


    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleting(Employee $employee)
    {
        $employee->department()->decrement('EmployeeCount');
        $employee->department()->sync([]);
        $this->runMaxWage();
    }

}
