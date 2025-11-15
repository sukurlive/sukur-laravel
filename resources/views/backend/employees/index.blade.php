@extends('backend.dashboard.index')

@section('title', 'Data Pegawai')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold"> Data Pegawai</h4>
        <a href="{{route('emp.create')}}" class="btn btn-primary btn-sm">+ Tambah Pegawai</a>    
    </div>

    <div>
        <form action="{{ route('emp.index') }}" method="GET" class="mb-3 d-flex">
            <input type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Cari berdasarkan Nama atau Email..." 
                    value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(request('search'))
                <a href="{{ route('emp.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
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
                        <th>Foto</th>
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
                        <td>
                            @if( $row->img)
                                <img src="{{ asset('image/'. $row->img) }}"
                                    alt="Foto {{ $row->nama}}"
                                    width="60" height="60"
                                    class="rounded-circle border">
                            @else
                                <span class="text-muted"> Tidak ada</span>
                            @endif
                        </td>
                        <!-- <td>{{ $row->nama }}</td> -->
                        <!-- @if(request('search'))
                                {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $row->nama) !!}
                        @else
                                {{ $row->nama }}
                        @endif -->
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->position->nama_jabatan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('emp.edit', $row->id_emp) }}" class="btn btn-warning btn-sm"> Edit</a>
                            <form action="{{ route('emp.delete', $row->id_emp) }}" method="POST" class="d-inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')"> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            @if(request('search'))
                                <div class="text-muted">
                                    <p class="mt-2">Tidak ada data yang sesuai dengan "<strong>{{ request('search') }}</strong>"</p>
                                    <a href="{{ route('emp.index') }}" class="btn btn-sm btn-primary">Lihat Semua Data</a>
                                </div>
                            @else
                                <div class="text-muted">
                                    <p class="mt-2">Belum ada data jabatan</p>
                                    <a href="{{ route('emp.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection