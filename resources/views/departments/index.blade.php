@extends('layouts.master')

@section('title', 'Data Departemen')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">🏢 Data Departemen</h3>
                <a href="{{ route('departments.create') }}" 
                   class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                    + Tambah Departemen
                </a>
            </div>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
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
                            <th>Nama Departemen</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $index => $dept)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $dept->name }}</td>
                                <td>{{ $dept->description ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('departments.show', $dept->id) }}" class="aksi-link">Detail</a>
                                        <a href="{{ route('departments.edit', $dept->id) }}" class="aksi-link">Edit</a>
                                        <form action="{{ route('departments.destroy', $dept->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Yakin ingin menghapus departemen ini?');" 
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="aksi-link-hapus border-0 bg-transparent p-0">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-4">Belum ada data departemen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- CSS --}}
<style>
    /* Gradasi biru laut untuk tombol tambah */
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

    /* Aksi link (Detail & Edit) */
    .aksi-link {
        color: #0d6efd;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
        cursor: pointer;
    }

    .aksi-link:hover,
    .aksi-link:focus {
        text-decoration: underline;
        color: #0a58ca;
    }

    /* Aksi link hapus */
    .aksi-link-hapus {
        color: #dc3545;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
        cursor: pointer;
    }

    .aksi-link-hapus:hover,
    .aksi-link-hapus:focus {
        text-decoration: underline;
        color: #bb2d3b;
    }

    /* Header tabel */
    .table thead {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
    }

    .table thead th {
        color: white;
        font-weight: 600;
    }

    /* Efek hover kartu */
    .card {
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection
