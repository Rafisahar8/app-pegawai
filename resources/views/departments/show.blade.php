@extends('layouts.master')

@section('title', 'Detail Departemen')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="fw-semibold text-primary mb-4">Detail Departemen</h3>

            <div class="mb-3">
                <label class="text-secondary fw-medium">Nama Departemen</label>
                <p class="fw-semibold fs-5 mb-0">{{ $department->name }}</p>
            </div>

            <div class="mb-3">
                <label class="text-secondary fw-medium">Deskripsi</label>
                <p class="mb-0">{{ $department->description ?? '-' }}</p>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a 
                    href="{{ route('departments.index') }}" 
                    class="btn text-white px-4 py-2"
                    style="
                        background: linear-gradient(90deg, #007bff, #00bfff);
                        border-radius: 10px;
                        transition: 0.3s;
                    "
                    onmouseover="this.style.opacity='0.9'"
                    onmouseout="this.style.opacity='1'"
                >
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>

{{-- CSS tambahan agar tampilan seragam --}}
<style>
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .text-primary {
        color: #007bff !important;
    }

    label {
        font-size: 0.95rem;
    }

    p {
        color: #212529;
    }
</style>
@endsection
