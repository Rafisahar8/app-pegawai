@extends('layouts.master')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h3 class="fw-bold text-primary mb-4">✏️ Edit Karyawan</h3>

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" 
                           value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" 
                           class="form-control rounded-3" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" 
                           value="{{ old('email', $employee->email) }}" 
                           class="form-control rounded-3" required>
                </div>

                {{-- Nomor Telepon --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" 
                           value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" 
                           value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control rounded-3" rows="3">{{ old('alamat', $employee->alamat) }}</textarea>
                </div>

                {{-- Tanggal Masuk --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" 
                           value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" 
                           class="form-control rounded-3">
                </div>

                {{-- Departemen --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Departemen</label>
                    <select name="departemen_id" class="form-select rounded-3">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" 
                                {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan</label>
                    <select name="jabatan_id" class="form-select rounded-3" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($positions as $pos)
                            <option value="{{ $pos->id }}" 
                                {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>
                                {{ $pos->position_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Gaji (readonly) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gaji Pokok</label>
                    <input type="text" class="form-control rounded-3" 
                           value="Rp {{ number_format($employee->gaji, 0, ',', '.') }}" readonly>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select rounded-3" required>
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary rounded-pill px-4 me-2 shadow-sm">Kembali</a>
                    <button type="submit" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                        💾 Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- CSS tambahan --}}
<style>
    /* Tombol gradasi biru laut */
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

    /* Card halus dan animasi hover */
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Label form tegas dan rapi */
    .form-label {
        color: #0d6efd;
    }

    /* Input & select halus */
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
