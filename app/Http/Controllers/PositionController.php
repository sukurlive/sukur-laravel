<?php

namespace App\Http\Controllers;

use App\models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::all();

        return view('backend.positions.index', compact('position'));
    }

    public function create()
    {
        return view('backend.positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan'  => 'required',
            'gaji_pokok'    => 'required',
        ]);

        Position::create($request->all());

        return redirect()->route('jbt.index')->with('success', 'Data jabatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);

        return view('backend.positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan'  => 'required',
            'gaji_pokok'    => 'required',
        ]);

        $position = Position::findOrFail($id);
        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('jbt.index')->with('success', 'Data jabatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('jbt.index')->with('success', 'Data jabatan berhasil dihapus');
    }
}
