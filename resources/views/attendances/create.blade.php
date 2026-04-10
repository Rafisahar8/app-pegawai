@extends('layouts.master')

@section('title', 'Tambah Absensi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3 fw-semibold text-primary">Tambah Absensi</h2>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf

                {{-- Nama Karyawan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Karyawan</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- Waktu Masuk --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Waktu Masuk</label>
                    <input type="time" name="waktu_masuk" class="form-control">
                </div>

                {{-- Waktu Keluar --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Waktu Keluar</label>
                    <input type="time" name="waktu_keluar" class="form-control">
                </div>

                {{-- Status Absensi --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status Absensi</label>
                    <select name="status_absensi" class="form-select" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-gradient">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
