@extends('backend.dashboard.index')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Data Jabatan</h4>

    <form action="{{ route('jbt.update', $position->id_position) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" id="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <textarea name="gaji_pokok" id="gaji_pokok" class="form-control">{{ old('gaji_pokok', $position->gaji_pokok) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('jbt.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection