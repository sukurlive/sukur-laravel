@extends('backend.dashboard.index')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Data Pegawai</h4>

    <form action="{{ route('emp.update', $employee->id_emp) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan ID</label>
            <input type="text" value="{{ $employee->jabatan_id }}" class="form-control" disabled>
            <input type="hidden" name="jabatan_id" value="{{ $employee->jabatan_id }}">
        </div> -->
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>

            <!-- Dropdown non-editable -->
            <select id="jabatan_id_disabled" class="form-select" disabled>
                @foreach ($positions as $pos)
                    <option value="{{ $pos->id_jabatan }}" 
                        {{ $pos->id_position == $employee->jabatan_id ? 'selected' : '' }}>
                        {{ $pos->nama_jabatan }}
                    </option>
                @endforeach
            </select>

            <!-- Hidden input agar data tetap terkirim -->
            <input type="hidden" name="jabatan_id" value="{{ $employee->jabatan_id }}">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $employee->nama) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $employee->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea type="text" name="alamat" id="alamat" class="form-control">{{ old('alamat', $employee->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>

            @if($employee->img)
            <div class="mt-2">
                <img src="{{ asset('image/'. $employee->img) }}" alt="foto Pegawai" width="120" class="rounded shadow-sm">
            </div>
            @endif

            @error('foto')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('emp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection