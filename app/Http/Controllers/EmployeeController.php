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

    public function create()
    {
        return view('backend.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id'    => 'required',
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'alamat'        => 'nullable|string',
        ]);

        Employee::create($request->all());

        return redirect()->route('emp.index')->with('success', 'Data Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('backend.employees.edit', compact('employee'));
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('emp.index')->with('success', 'Data employee berhasil dihapus');
    }
}
