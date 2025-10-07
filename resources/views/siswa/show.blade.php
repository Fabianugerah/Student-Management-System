@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <!-- Tombol Aksi di Kanan Atas -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <div class="row">
                    <!-- Kolom Kiri: Avatar & Info Dasar -->
                    <div class="col-md-4 text-center">

                        <div class="mb-3">
                            <h5 class="text-muted mb-1">{{ $siswa->nama_siswa }}</h5>
                        </div>

                        <div class="mb-4">
                            <!-- Avatar Circle -->
                            <div class="avatar-circle mx-auto d-flex align-items-center justify-content-center"
                                style="width: 130px; height: 130px; border-radius: 50%; background-color: #6c757d; color: white; font-size: 4rem; font-weight: bold;">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted mb-1">{{ $siswa->nisn }}</h6>
                        </div>

                        <div>
                            <span class="badge
                                    {{ $siswa->kelas == 'XII-RPL' ? 'bg-warning' : 'bg-info' }}
                                    {{ $siswa->kelas == 'XII-TKJ' ? 'bg-warning' : 'bg-info' }}
                                    {{ $siswa->kelas == 'XII-DKV' ? 'bg-warning' : 'bg-info' }}
                                    {{ $siswa->kelas == 'XII-MKT' ? 'bg-warning' : 'bg-info' }}
                                    px-3 py-2" style="font-size: 0.9rem;">
                                Kelas {{ $siswa->kelas }}
                            </span>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Informasi Pribadi -->
                    <div class="col-md-8">
                        <div class="ps-md-4">
                            <h5 class="mb-4 pb-3 border-bottom">Informasi Pribadi</h5>

                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="35%" class="py-2"><strong>Jenis Kelamin</strong></td>
                                        <td width="5%" class="py-2">:</td>
                                        <td class="py-2">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2"><strong>Tempat, Tanggal Lahir</strong></td>
                                        <td class="py-2">:</td>
                                        <td class="py-2">
                                            {{ $siswa->tempat_lahir }},
                                            {{ $siswa->tanggal_lahir ? $siswa->tanggal_lahir->format('d F Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2"><strong>Alamat</strong></td>
                                        <td class="py-2">:</td>
                                        <td class="py-2">{{ $siswa->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2"><strong>No. Telepon</strong></td>
                                        <td class="py-2">:</td>
                                        <td class="py-2">
                                            @if($siswa->telepon)
                                            {{ $siswa->telepon }}
                                            @else
                                            <span class="text-muted fst-italic">Tidak ada</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2"><strong>Terdaftar</strong></td>
                                        <td class="py-2">:</td>
                                        <td class="py-2">{{ $siswa->created_at->format('d F Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
<!-- Script khusus untuk halaman show sudah dipindah ke custom.js -->
@endpush
