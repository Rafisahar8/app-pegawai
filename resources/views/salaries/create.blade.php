@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-primary mb-0">Tambah Data Gaji</h2>
                <a href="{{ route('salaries.index') }}" 
                   class="btn text-white fw-semibold px-4 py-2"
                   style="background: linear-gradient(90deg, #007bff, #00aaff); border-radius: 10px;">
                    Kembali
                </a>
            </div>

            {{-- Form Tambah Gaji --}}
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Karyawan</label>
                    <select name="karyawan_id" class="form-select shadow-sm" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Bulan</label>
                    <input type="text" name="bulan" class="form-control shadow-sm" placeholder="Contoh: 2025-10" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control shadow-sm" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tunjangan</label>
                    <input type="number" name="tunjangan" class="form-control shadow-sm" step="0.01">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Potongan</label>
                    <input type="number" name="potongan" class="form-control shadow-sm" step="0.01">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" 
                            class="btn text-white fw-semibold px-4 py-2"
                            style="background: linear-gradient(90deg, #007bff, #00aaff); border-radius: 10px;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- CSS disamakan dengan halaman lain --}}
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 15px;
        background-color: #fff;
        border: none;
    }
    .card-body {
        padding: 2rem;
    }
    .form-label {
        color: #333;
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease-in-out;
    }
    .form-control:focus, .form-select:focus {
        border-color: #00aaff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.2);
    }
    .btn {
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .btn:hover {
        opacity: 0.85;
        transform: translateY(-2px);
    }
</style>
@endsection
