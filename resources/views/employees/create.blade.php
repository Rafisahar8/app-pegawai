@extends('layouts.master')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold text-primary mb-4">➕ Tambah Karyawan</h3>

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" 
                           class="form-control rounded-3" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           class="form-control rounded-3" required>
                </div>

                {{-- Nomor Telepon --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control rounded-3" rows="3">{{ old('alamat') }}</textarea>
                </div>

                {{-- Tanggal Masuk --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Departemen --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Departemen</label>
                    <select name="departemen_id" class="form-select rounded-3">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departments as $dep)
                            <option value="{{ $dep->id }}" {{ old('departemen_id') == $dep->id ? 'selected' : '' }}>
                                {{ $dep->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan</label>
                    <select name="jabatan_id" class="form-select rounded-3" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($positions as $pos)
                            <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                                {{ $pos->position_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select rounded-3" required>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary rounded-pill px-4 me-2 shadow-sm">Kembali</a>
                    <button type="submit" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- CSS tambahan --}}
<style>
    /* Tombol biru laut gradasi */
    .btn-gradient-blue {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        border: none;
        color: white;
        transition: 0.3s ease;
    }

    .btn-gradient-blue:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Card lembut dan animasi hover */
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Label form dan input modern */
    .form-label {
        color: #0d6efd;
    }

    .form-control, .form-select {
        border-radius: 0.6rem;
        transition: border-color 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0dcaf0;
        box-shadow: 0 0 5px rgba(13, 202, 240, 0.4);
    }
</style>
@endsection
