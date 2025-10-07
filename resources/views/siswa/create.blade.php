@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>Tambah Data Siswa
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('nisn') is-invalid @enderror"
                                id="nisn"
                                name="nisn"
                                value="{{ old('nisn') }}"
                                placeholder="Masukkan NISN"
                                maxlength="10">
                            @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                            <select class="form-select @error('kelas') is-invalid @enderror"
                                id="kelas"
                                name="kelas">
                                <option value="">Pilih Kelas</option>
                                <option value="XII-RPL" {{ old('kelas') == 'XII-RPL' ? 'selected' : '' }}>XII-RPL</option>
                                <option value="XII-TKJ" {{ old('kelas') == 'XII-TKJ' ? 'selected' : '' }}>XII-TKJ</option>
                                <option value="XII-DKV" {{ old('kelas') == 'XII-DKV' ? 'selected' : '' }}>XII-DKV</option>
                                <option value="XII-MKT" {{ old('kelas') == 'XII-MKT' ? 'selected' : '' }}>XII-MKT</option>
                                <option value="XII-APHP" {{ old('kelas') == 'XII-APHP' ? 'selected' : '' }}>XII-APHP</option>
                                <option value="XII-ATPH" {{ old('kelas') == 'XII-ATPH' ? 'selected' : '' }}>XII-ATPH</option>
                                <option value="XII-TPM" {{ old('kelas') == 'XII-TPM' ? 'selected' : '' }}>XII-TPM</option>
                                <option value="XII-TL" {{ old('kelas') == 'XII-TL' ? 'selected' : '' }}>XII-TL</option>
                                <option value="XII-TBKR" {{ old('kelas') == 'XII-TBKR' ? 'selected' : '' }}>XII-TBKR</option>
                                <option value="XII-TKR" {{ old('kelas') == 'XII-TKR' ? 'selected' : '' }}>XII-TKR</option>
                            </select>
                            @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('nama_siswa') is-invalid @enderror"
                            id="nama_siswa"
                            name="nama_siswa"
                            value="{{ old('nama_siswa') }}"
                            placeholder="Masukkan nama lengkap siswa"
                            maxlength="100">
                        @error('nama_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin"
                                name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="text"
                                class="form-control @error('telepon') is-invalid @enderror"
                                id="telepon"
                                name="telepon"
                                value="{{ old('telepon') }}"
                                placeholder="Masukkan nomor telepon"
                                maxlength="15">
                            @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                id="tempat_lahir"
                                name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}"
                                placeholder="Masukkan tempat lahir"
                                maxlength="50">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                            rows="3"
                            placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-redo me-1"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
