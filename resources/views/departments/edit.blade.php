@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-4 fw-semibold text-primary">Edit Departemen</h3>

            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Departemen --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-medium">Nama Departemen</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control shadow-sm"
                        value="{{ old('name', $department->name) }}" 
                        required
                    >
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-medium">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description"
                        class="form-control shadow-sm" 
                        rows="3"
                    >{{ old('description', $department->description) }}</textarea>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4 d-flex justify-content-end">
                    <a 
                        href="{{ route('departments.index') }}" 
                        class="btn btn-secondary me-2 px-4"
                        style="border-radius: 10px;"
                    >
                        Kembali
                    </a>
                    <button 
                        type="submit" 
                        class="btn text-white px-4"
                        style="
                            background: linear-gradient(90deg, #007bff, #0056b3);
                            border-radius: 10px;
                            transition: 0.3s;
                        "
                        onmouseover="this.style.opacity='0.9'"
                        onmouseout="this.style.opacity='1'"
                    >
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
