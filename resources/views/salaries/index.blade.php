@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="fw-bold text-primary mb-4">💰 Daftar Gaji Karyawan</h3>

            <a href="{{ route('salaries.create') }}" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm mb-4">
                + Tambah Gaji
            </a>

            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Bulan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                            <tr>
                                <td class="fw-semibold">{{ $salary->employee->nama_lengkap }}</td>
                                <td>{{ $salary->bulan }}</td>
                                <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                                <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                                <td>
                                    <a href="{{ route('salaries.edit', $salary->id) }}" 
                                       class="text-primary text-decoration-none aksi-link fw-semibold me-2">
                                        Edit
                                    </a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent text-danger text-decoration-none aksi-link fw-semibold p-0">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted fst-italic py-3">Belum ada data gaji karyawan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- === CSS disamakan dengan index lain === --}}
<style>
    /* === Tombol gradasi biru laut === */
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

    /* === Judul === */
    h3.text-primary {
        color: #005f91;
    }

    /* === Tabel === */
    table thead th {
        color: #495057;
        font-weight: 600;
        background-color: #f8f9fa;
    }

    table tbody td {
        vertical-align: middle;
        font-size: 1rem;
        color: #212529;
    }

    table tr:hover {
        background-color: #f1f9ff;
        transition: 0.2s;
    }

    /* === Efek card === */
    .card {
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* === Aksi link === */
    .aksi-link {
        cursor: pointer;
        transition: 0.2s ease;
    }

    .aksi-link:hover {
        text-decoration: underline !important;
        opacity: 0.8;
    }

    /* === Total gaji warna hitam === */
    td strong {
        color: #000 !important;
    }
</style>
@endsection
