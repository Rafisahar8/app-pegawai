@extends('layouts.master')

@section('title', 'Detail Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="fw-bold text-primary mb-4">💼 Detail Jabatan</h3>

            <table class="table table-borderless">
                <tr>
                    <th style="width: 220px;" class="text-secondary">Nama Jabatan</th>
                    <td class="fw-semibold">{{ $position->position_name }}</td>
                </tr>
                <tr>
                    <th class="text-secondary">Departemen</th>
                    {{-- Perbaikan di sini --}}
                    <td>{{ $position->department->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-secondary">Gaji Pokok</th>
                    <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                </tr>
            </table>

            <div class="mt-4">
                <a href="{{ route('positions.index') }}" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>

{{-- CSS seragam dengan detail lainnya --}}
<style>
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

    h3.text-primary {
        color: #005f91;
    }

    table th {
        font-weight: 600;
        vertical-align: middle;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    table td {
        vertical-align: middle;
        font-size: 1rem;
        color: #fafcfeff;
    }

    .card {
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.08);
    }
</style>
@endsection
