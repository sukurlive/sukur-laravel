<?php

namespace App\Http\Controllers;

use App\models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $position = Position::all();
        $search = $request->input('search');

        // Buat query dasar
        $query = Position::query();

        // Jika ada kata kunci pencarian, filter data
        if(!empty($search)) 
        {
            $query->where('nama_jabatan', 'like', '%'.$search.'%')->orWhere('gaji_pokok', 'like', '%'.$search.'%');
        $position = $query->orderBy('nama_jabatan', 'asc')->get();

            return view('backend.positions.index', compact( 'position'));

        }else{
                        return view('backend.positions.index', compact( 'position'));

        }

        // Ambil hasil (bisa pakai paginate jika ingin)

        //kirim data ke view
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
