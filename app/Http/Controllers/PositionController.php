<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::with('department')->get();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('positions.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required|string|max:255|unique:positions,position_name',
            'department_id' => 'required|exists:departments,id',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create([
            'position_name' => $request->position_name,
            'department_id' => $request->department_id,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $position = Position::with('department')->findOrFail($id);
        return view('positions.show', compact('position'));
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();
        return view('positions.edit', compact('position', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $position = Position::findOrFail($id);

        $request->validate([
            'position_name' => 'required|string|max:255|unique:positions,position_name,' . $position->id,
            'department_id' => 'required|exists:departments,id',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position->update([
            'position_name' => $request->position_name,
            'department_id' => $request->department_id,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
