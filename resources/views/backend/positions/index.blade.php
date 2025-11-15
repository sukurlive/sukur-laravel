@extends('backend.dashboard.index')

@section('title', 'Data Jabatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold"> Data Jabatan</h4>
        <a href="{{route('jbt.create')}}" class="btn btn-primary btn-sm">+ Tambah Jabatan</a>    
    </div>

    <form action="{{ route('jbt.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" 
                name="search" 
                class="form-control" 
                placeholder="Cari berdasarkan Nama Jabatan atau Gaji..." 
                value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
        @if(request('search'))
            <a href="{{ route('jbt.index') }}" class="btn btn-secondary">Reset</a>
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
                        <th>Position ID</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($position as $row)
                    <tr>
                        <td>{{ $row->id_position }}</td>
                        <td>
                            @if(request('search'))
                                {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $row->nama_jabatan) !!}
                            @else
                                {{ $row->nama_jabatan }}
                            @endif
                        </td>
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
                        <td colspan="4" class="text-center py-4">
                            @if(request('search'))
                                <div class="text-muted">
                                    <p class="mt-2">Tidak ada data yang sesuai dengan "<strong>{{ request('search') }}</strong>"</p>
                                    <a href="{{ route('jbt.index') }}" class="btn btn-sm btn-primary">Lihat Semua Data</a>
                                </div>
                            @else
                                <div class="text-muted">
                                    <p class="mt-2">Belum ada data jabatan</p>
                                    <a href="{{ route('jbt.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
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