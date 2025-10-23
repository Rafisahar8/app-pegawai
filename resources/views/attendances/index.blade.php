@extends('layouts.master')

@section('title', 'Data Absensi')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            {{-- Header judul dan tombol tambah --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">📅 Data Absensi Karyawan</h3>
                <a href="{{ route('attendances.create') }}" class="btn btn-gradient-blue rounded-pill px-4 fw-semibold shadow-sm">
                    + Tambah Absensi
                </a>
            </div>

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Form filter --}}
            <form action="{{ route('attendances.index') }}" method="GET" class="d-flex flex-wrap gap-2 mb-4">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control" style="width: 180px;">
                <select name="status" class="form-select" style="width: 150px;">
                    <option value="">-- Semua Status --</option>
                    <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpha" {{ request('status') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                </select>
                <button type="submit" class="btn btn-success px-3">Filter</button>
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary px-3">Reset</a>
            </form>

            {{-- Tabel absensi --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $att)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $att->employee->nama_lengkap }}</td>
                                <td class="text-nowrap">{{ \Carbon\Carbon::parse($att->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $att->waktu_masuk ?? '-' }}</td>
                                <td>{{ $att->waktu_keluar ?? '-' }}</td>
                                <td>
                                    <span class="badge 
                                        @if($att->status_absensi == 'hadir') bg-success 
                                        @elseif($att->status_absensi == 'izin') bg-warning 
                                        @elseif($att->status_absensi == 'sakit') bg-info 
                                        @else bg-danger @endif">
                                        {{ ucfirst($att->status_absensi) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('attendances.edit', $att->id) }}" class="text-decoration-none action-link text-primary fw-semibold">
                                            Edit
                                        </a>
                                        <form action="{{ route('attendances.destroy', $att->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');" style="display:inline;">
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
                                <td colspan="7" class="text-muted py-4">Tidak ada data absensi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- CSS tambahan agar seragam --}}
<style>
    /* Tombol gradasi biru laut */
    .btn-gradient-blue {
        background: linear-gradient(90deg, #007bff, #00bfff);
        border: none;
        color: white;
        transition: 0.3s ease;
    }

    .btn-gradient-blue:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Efek hover pada card */
    .card {
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Link aksi underline saat hover */
    .action-link:hover {
        text-decoration: underline !important;
    }

    /* Supaya kolom tanggal tidak pecah baris */
    .text-nowrap {
        white-space: nowrap;
    }
</style>
@endsection
