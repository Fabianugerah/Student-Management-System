@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<!-- Form Pencarian atau Search -->
<div class="row mb-3">
    <div class="col-12">
        <form method="GET" action="{{ route('siswa.index') }}" class="d-flex gap-2">
            <div class="flex-grow-1">
                <input type="text"
                    class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama atau NISN...">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search me-1"></i>Cari
            </button>
            @if(request('search'))
            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-times me-1"></i>Reset
            </a>
            @endif
        </form>
    </div>
</div>

@if(request('search'))
<div class="alert alert-info mb-3">
    <i class="fas fa-info-circle me-2"></i>
    Menampilkan hasil pencarian untuk "<strong>{{ request('search') }}</strong>" - Ditemukan {{ $siswa->total() }} data
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>Data Siswa
                </h5>
                <div>
                    <a href="{{ route('siswa.create') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Siswa
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($siswa->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="12%">NISN</th>
                                <th width="20%">Nama Siswa</th>
                                <th width="10%">Kelas</th>
                                <th width="13%">Tempat Lahir</th>
                                <th width="12%">Tgl Lahir</th>
                                <th width="10%" class="text-center">Jenis Kelamin</th>
                                <th width="18%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $index => $item)
                            <tr>
                                <td>{{ $siswa->firstItem() + $index }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $item->nisn }}</span>
                                </td>
                                <td>
                                    <strong>{{ $item->nama_siswa }}</strong>
                                </td>
                                <td>
                                    <span class="badge
                                    {{ $item->kelas == 'XII-RPL' ? 'bg-warning' : 'bg-info' }}
                                    {{ $item->kelas == 'XII-TKJ' ? 'bg-warning' : 'bg-info' }}
                                    {{ $item->kelas == 'XII-DKV' ? 'bg-warning' : 'bg-info' }}
                                    {{ $item->kelas == 'XII-MKT' ? 'bg-warning' : 'bg-info' }}">
                                        {{ $item->kelas }}
                                    </span>
                                </td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tanggal_lahir ? $item->tanggal_lahir->format('d-m-Y') : '-' }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $item->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }}">
                                        {{ $item->jenis_kelamin }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('siswa.show', $item->id) }}"
                                            class="btn btn-outline-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('siswa.edit', $item->id) }}"
                                            class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            class="btn btn-outline-danger"
                                            title="Hapus"
                                            onclick="confirmDelete('{{ $item->id }}', '{{ $item->nisn }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        @if($siswa->total() > 0)
                        Menampilkan {{ $siswa->firstItem() }} - {{ $siswa->lastItem() }}
                        dari {{ $siswa->total() }} data
                        @if(request('search'))
                        (hasil pencarian)
                        @endif
                        @else
                        Tidak ada data yang ditemukan
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $siswa->links() }}
                    </div>
                </div>
                @else
                <div class="text-center py-5">
                    @if(request('search'))
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Tidak ada data yang ditemukan</h5>
                    <p class="text-muted">
                        Tidak ada siswa dengan nama atau NISN "<strong>{{ request('search') }}</strong>"
                    </p>
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-primary me-2">
                        <i class="fas fa-arrow-left me-1"></i>Lihat Semua Data
                    </a>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Siswa
                    </a>
                    @else
                    <i class="fas fa-users fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data siswa</h5>
                    <p class="text-muted">Silakan tambahkan data siswa terlebih dahulu</p>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Siswa
                    </a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Form untuk delete -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
@endpush
