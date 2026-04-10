<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter dari query string
        $tanggal = $request->input('tanggal');
        $status = $request->input('status');

        // Query dasar
        $query = Attendance::with('employee')->orderBy('tanggal', 'desc');

        // Filter tanggal jika ada
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        // Filter status jika ada
        if ($status) {
            $query->where('status_absensi', $status);
        }

        $attendances = $query->get();

        return view('attendances.index', compact('attendances', 'tanggal', 'status'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
