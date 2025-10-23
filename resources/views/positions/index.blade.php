@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-primary mb-0">📋 Data Jabatan</h2>
                <a href="{{ route('positions.create') }}" 
                   class="btn btn-gradient-blue rounded-pill fw-semibold px-4 shadow-sm">
                    + Tambah Jabatan
                </a>
            </div>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-primary text-center">
                        <tr>
                            <th scope="col" style="width: 60px;">No</th>
                            <th scope="col">Nama Jabatan</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Gaji Pokok</th>
                            <th scope="col" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($positions as $index => $pos)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold text-dark">{{ $pos->position_name }}</td>
                                <td>{{ $pos->department->name ?? '-' }}</td>
                                <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('positions.show', $pos->id) }}" class="text-primary text-decoration-none aksi-link fw-semibold">Detail</a>
                                    <a href="{{ route('positions.edit', $pos->id) }}" class="text-success text-decoration-none aksi-link fw-semibold">Edit</a>
                                    <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent text-danger text-decoration-none aksi-link fw-semibold p-0">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted py-3">Belum ada data jabatan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- === CSS disamakan dengan Employee === --}}
<style>
    body {
        background-color: #f8f9fa;
    }

    /* Card */
    .card {
        border-radius: 15px;
        background-color: #fff;
        transition: 0.3s ease;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* Tombol gradasi biru */
    .btn-gradient-blue {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        color: white;
        border: none;
        transition: 0.3s ease;
    }
    .btn-gradient-blue:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Judul */
    h2.text-primary {
        color: #005f91 !important;
    }

    /* Tabel */
    .table thead {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        color: #fff;
    }
    .table tbody tr:hover {
        background-color: #f1faff;
        transition: 0.2s ease-in-out;
    }
    .table td, .table th {
        vertical-align: middle;
        border: none;
    }

    /* Link aksi */
    .aksi-link {
        transition: 0.2s;
        margin: 0 4px;
    }
    .aksi-link:hover {
        text-decoration: underline !important;
        opacity: 0.8;
    }

    /* Alert */
    .alert {
        border-radius: 10px;
        font-weight: 500;
    }
</style>
@endsection
