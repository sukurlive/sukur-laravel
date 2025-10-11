@extends('backend.dashboard.index')

@section('title', 'Data Pegawai')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold"> Data Pegawai</h4>
        <a href="" class="btn btn-primary btn-sm">+ Tambah Pegawai</a>    
    </div>

    <!-- Pesan Sukses -->
    @if(session('succsess'))
    <div class="alert alert-sucsess">{{session('success')}}</div>
    @endif

    <div class="card bordered-0 shadow-sm rounded-3">
        <div class="card body">
            <table class="table table-striped table-bordered">
                <thead class="table light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($emp as $row)
                    <tr>
                        <td>{{ $row->id_emp }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->jabatan_id }}</td>
                        <td>
                            <a href="{{ route('emp.edit', $row->id_emp) }}" class="btn btn-warning btn-sm"> Edit</a>
                            <form action="{{ route('emp.destroy', $row->id_emp) }}" method="POST" class="d-inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" on-click="return confirm('Yakin hapus data ini?')"> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center"> Belum ada data pegawai</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection