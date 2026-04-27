@extends('layouts.app')

@section('title', 'Tambah KRS')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah KRS</h2>

    <form action="{{ route('krs.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Mahasiswa</label>
            <select name="npm" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->npm }}">{{ $mhs->npm }} - {{ $mhs->nama }}</option>
                @endforeach
            </select>
            @error('npm')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Matakuliah</label>
            <select name="kode_matakuliah" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($matakuliahs as $mk)
                <option value="{{ $mk->kode_matakuliah }}">{{ $mk->kode_matakuliah }} - {{ $mk->nama_matakuliah }}</option>
                @endforeach
            </select>
            @error('kode_matakuliah')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-between">
            <a href="{{ route('krs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection

