<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['matakuliah', 'dosen'])->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('jadwal.create', compact('matakuliahs', 'dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|size:8|exists:matakuliah,kode_matakuliah',
            'nidn' => 'required|string|size:10|exists:dosen,nidn',
            'kelas' => 'required|string|size:1',
            'hari' => 'required|string|max:10',
            'jam' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliahs', 'dosens'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|size:8|exists:matakuliah,kode_matakuliah',
            'nidn' => 'required|string|size:10|exists:dosen,nidn',
            'kelas' => 'required|string|size:1',
            'hari' => 'required|string|max:10',
            'jam' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->only('kode_matakuliah', 'nidn', 'kelas', 'hari', 'jam'));
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}

