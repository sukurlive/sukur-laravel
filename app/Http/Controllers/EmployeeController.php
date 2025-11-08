<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
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
        $jabatan = Position::all();

        return view('backend.employees.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id'    => 'required',
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'alamat'        => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'jabatan_id'    => $request->jabatan_id,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'alamat'        => $request->alamat,
        ];

        //Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $nama_file);

            $data['img'] = $nama_file;
        }

        Employee::create($data);

        return redirect()->route('emp.index')->with('success', 'Data Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('backend.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id . ',id_emp',
            'alamat' => 'nullable|string',
            'jabatan_id' => 'required|string',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jabatan_id' => $request->jabatan_id,
        ]);

        return redirect()->route('emp.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('emp.index')->with('success', 'Data employee berhasil dihapus');
    }
}
