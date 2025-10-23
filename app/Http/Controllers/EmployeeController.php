<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['position', 'department'])->get();
        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'jabatan_id' => 'required|exists:positions,id',
            'departemen_id' => 'nullable|exists:departments,id',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $position = Position::find($request->jabatan_id);
        $gaji = $position ? $position->gaji_pokok : 0;

        Employee::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jabatan_id' => $request->jabatan_id,
            'departemen_id' => $request->departemen_id,
            'status' => $request->status,
            'gaji' => $gaji,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'jabatan_id' => 'required|exists:positions,id',
            'departemen_id' => 'nullable|exists:departments,id',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $position = Position::find($request->jabatan_id);
        $gaji = $position ? $position->gaji_pokok : $employee->gaji;

        $employee->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jabatan_id' => $request->jabatan_id,
            'departemen_id' => $request->departemen_id,
            'status' => $request->status,
            'gaji' => $gaji,
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus!');
    }

    public function show($id)
    {
        $employee = Employee::with(['position', 'department'])->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

}
