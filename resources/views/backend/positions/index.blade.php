@extends('backend.dashboard.index')

@section('title', 'Data Jabatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold"> Data Jabatan</h4>
        <a href="{{route('jbt.create')}}" class="btn btn-primary btn-sm">+ Tambah Jabatan</a>    
    </div>

    <!-- Pesan Sukses -->
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="card bordered-0 shadow-sm rounded-3">
        <div class="card body">
            <table class="table table-striped table-bordered">
                <thead class="table light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jabatan as $row)
                    <tr>
                        <td>{{ $row->id_position }}</td>
                        <td>{{ $row->nama_jabatan }}</td>
                        <td>{{ $row->gaji_pokok }}</td>
                        <td>
                            <a href="{{ route('jbt.edit', $row->id_position) }}" class="btn btn-warning btn-sm"> Edit</a>
                            <form action="{{ route('jbt.delete', $row->id_position) }}" method="POST" class="d-inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')"> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"> Belum ada data jabatan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection