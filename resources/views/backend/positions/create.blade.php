@extends('backend.dashboard.index')
@section('title', 'input jabatan')

@section('content')
<div class="container">
    <h2>Tambah Jabatan</h2>
    <form action="{{route('jbt.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Gajai Pokok</label>
            <input type="number" name="gaji_pokok" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{route('jbt.index')}}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection