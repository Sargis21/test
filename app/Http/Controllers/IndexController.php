<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index ()
    {
        $departments = Department::with('employee')->get();
        $employees = Employee::with('department')->get();
        return view('index', compact('departments', 'employees'));
    }
}
