<?php

namespace App\Observers;

use App\Models\Employee;


class EmployeeObserver
{

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        $employee->department()->attach(request()->get('department'));
    }


    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleting(Employee $employee)
    {
        $employee->department()->sync([]);
    }

}
