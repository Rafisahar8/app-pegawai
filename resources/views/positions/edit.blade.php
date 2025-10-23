@extends('layouts.master')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="fw-bold text-primary mb-4">✏️ Edit Jabatan</h3>

            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Jabatan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Nama Jabatan</label>
                    <input 
                        type="text" 
                        name="position_name" 
                        class="form-control rounded-3 shadow-sm"
                        value="{{ old('position_name', $position->position_name) }}" 
                        required
                    >
                </div>

                {{-- Departemen --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Departemen</label>
                    <select 
                        name="department_id" 
                        class="form-select rounded-3 shadow-sm"
                        required
                    >
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" 
                                {{ $position->department_id == $dept->id ? 'selected' : '' }}>
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Gaji Pokok --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Gaji Pokok</label>
                    <input 
                        type="number" 
                        name="gaji_pokok" 
                        class="form-control rounded-3 shadow-sm"
                        min="0" 
                        step="1000"
                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}" 
                        required
                    >
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('positions.index') }}" class="btn btn-gradient-gray rounded-pill px-4 fw-semibold me-2 shadow-sm">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                        💾 Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- === CSS === --}}
<style>
    /* === Card & Animasi === */
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* === Warna tombol utama === */
    .btn-gradient-blue {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-gradient-blue:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* === Tombol abu-abu === */
    .btn-gradient-gray {
        background: linear-gradient(90deg, #6c757d, #adb5bd);
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-gradient-gray:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* === Label dan input === */
    .form-label {
        font-size: 0.95rem;
    }

    .form-control, .form-select {
        border: 1px solid #dee2e6;
        transition: all 0.2s ease-in-out;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
    }

    /* === Judul === */
    h3.text-primary {
        color: #005f91;
    }
</style>
@endsection
