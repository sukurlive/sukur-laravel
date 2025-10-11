<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();
        return view('backend.employees.index', compact('emp'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.employees.edit', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Data employee berhasil dihapus');
    }
}
