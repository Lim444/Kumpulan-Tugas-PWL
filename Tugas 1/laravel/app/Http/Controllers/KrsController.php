<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->get();
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('krs.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|string|size:10|exists:mahasiswa,npm',
            'kode_matakuliah' => 'required|string|size:8|exists:matakuliah,kode_matakuliah',
        ]);

        Krs::create($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $krsItem = Krs::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        return view('krs.edit', compact('krsItem', 'mahasiswas', 'matakuliahs'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm' => 'required|string|size:10|exists:mahasiswa,npm',
            'kode_matakuliah' => 'required|string|size:8|exists:matakuliah,kode_matakuliah',
        ]);

        $krsItem = Krs::findOrFail($id);
        $krsItem->update($request->only('npm', 'kode_matakuliah'));
        return redirect()->route('krs.index')->with('success', 'KRS berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $krsItem = Krs::findOrFail($id);
        $krsItem->delete();
        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus');
    }
}

