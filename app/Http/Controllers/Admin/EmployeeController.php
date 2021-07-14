<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Employee::orderByDesc('id')->get();
        return view('admin.employee.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create', ['departments' => Department::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $item = Employee::employeeSave($request);
        if ($item) {
            return redirect()->route('employee.index')->with(['name' => 'added ' . $item->name]);
        } else {
            return back()->with(['error' => 'Server error']);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('admin.employee.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $item = Employee::employeeUpdate($request, $employee);
        if ($item) {
            return redirect()->route('employee.index')->with(['name' => 'updated ' . $item->name]);
        } else {
            return back()->with(['error' => 'Server error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employeeName = $employee->name;
            $employee->delete();
            return back()->with(['name' => 'deleted ' . $employeeName]);
        } catch (\Exception $e) {
            return back()->with(['error' => 'Server error']);
        }
    }
}
