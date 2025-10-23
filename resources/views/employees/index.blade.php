@extends('layouts.master')

@section('title', 'Data Karyawan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">📋 Data Karyawan</h3>
                <a href="{{ route('employees.create') }}" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                    + Tambah Karyawan
                </a>
            </div>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Tanggal Masuk</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Gaji</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $index => $employee)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $employee->nama_lengkap }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->nomor_telepon ?? '-' }}</td>

                                {{-- tanggal lahir --}}
                                <td class="text-nowrap">
                                    {{ !empty($employee->tanggal_lahir) ? \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y') : '-' }}
                                </td>

                                <td>{{ $employee->alamat ?? '-' }}</td>

                                {{-- tanggal masuk --}}
                                <td class="text-nowrap">
                                    {{ !empty($employee->tanggal_masuk) ? \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d-m-Y') : '-' }}
                                </td>

                                <td>{{ optional($employee->position)->position_name ?? '-' }}</td>
                                <td>{{ optional($employee->department)->name ?? '-' }}</td>

                                {{-- gaji --}}
                                <td class="text-nowrap">Rp {{ number_format($employee->gaji ?? 0, 0, ',', '.') }}</td>

                                {{-- status --}}
                                <td class="fw-semibold" style="color: {{ ($employee->status ?? '') == 'Aktif' ? 'green' : 'red' }};">
                                    {{ $employee->status ?? '-' }}
                                </td>

                                {{-- aksi --}}
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('employees.show', $employee->id) }}" class="text-decoration-none text-primary fw-semibold action-link">
                                            Detail
                                        </a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-decoration-none text-primary fw-semibold action-link">
                                            Edit
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent text-danger fw-semibold p-0 action-link" style="cursor:pointer;">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-muted py-4">Belum ada data karyawan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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

    /* Hover underline di tautan Detail/Edit/Hapus */
    .action-link:hover {
        text-decoration: underline !important;
    }

    /* Tabel rapi */
    .table th, .table td {
        vertical-align: middle;
    }

    /* Mencegah teks pecah di kolom tanggal/gaji */
    .text-nowrap {
        white-space: nowrap;
    }

    /* Efek hover lembut pada card */
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection
