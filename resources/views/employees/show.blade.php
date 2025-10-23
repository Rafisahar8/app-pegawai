@extends('layouts.master')

@section('title', 'Detail Karyawan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">👤 Detail Karyawan</h3>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                    ← Kembali
                </a>
            </div>

            <table class="table table-hover align-middle shadow-sm">
                <tbody>
                    <tr>
                        <th class="bg-light text-primary">Nama Lengkap</th>
                        <td class="fw-semibold">{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Nomor Telepon</th>
                        <td>{{ $employee->nomor_telepon ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Tanggal Lahir</th>
                        <td>{{ $employee->tanggal_lahir ? \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Alamat</th>
                        <td>{{ $employee->alamat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Tanggal Masuk</th>
                        <td>{{ $employee->tanggal_masuk ? \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d-m-Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Departemen</th>
                        <td>{{ $employee->departemen ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Jabatan</th>
                        <td>{{ $employee->jabatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Status</th>
                        <td>
                            @if($employee->status === 'Aktif')
                                <span class="status-label active">Aktif</span>
                            @else
                                <span class="status-label inactive">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- CSS Kustom --}}
<style>
    .card {
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        width: 30%;
        font-weight: 600;
        vertical-align: middle !important;
        border-right: 2px solid #f0f0f0;
    }

    .table td {
        color: #333;
        vertical-align: middle !important;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease-in-out;
    }

    /* Label status */
    .status-label {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .status-label.active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-label.inactive {
        background-color: #e2e3e5;
        color: #383d41;
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white !important;
        box-shadow: 0 3px 10px rgba(13, 110, 253, 0.3);
    }
</style>
@endsection
