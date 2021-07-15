<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Department::withCount('employee')->with('employee')->orderByDesc('id')->get();
        return view('admin.department.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $item = Department::create($request->validated());
        return redirect()->route('department.index')->with(['name' => 'Increased ' . $item->name]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $name = $department->name;
        $department->update($request->validated());
        return redirect()->route('department.index')->with(['name' => 'Updated ' . $name . ' to ' . $department->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if(count($department->employee)) {
            return back()->with(['error' => 'You cannot delete a departments that has a employee']);
        }
        $name = $department->name;
        $department->delete();
        return redirect()->route('department.index')->with(['name' => 'Deleted ' . $name]);
    }
}
