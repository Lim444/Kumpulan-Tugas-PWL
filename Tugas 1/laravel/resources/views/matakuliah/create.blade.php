@extends('layouts.app')

@section('title', 'Tambah Matakuliah')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Matakuliah</h2>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kode Matakuliah</label>
            <input type="text" name="kode_matakuliah" maxlength="8" class="w-full border rounded px-3 py-2" required>
            @error('kode_matakuliah')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Matakuliah</label>
            <input type="text" name="nama_matakuliah" maxlength="50" class="w-full border rounded px-3 py-2" required>
            @error('nama_matakuliah')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">SKS</label>
            <input type="number" name="sks" min="1" max="6" class="w-full border rounded px-3 py-2" required>
            @error('sks')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-between">
            <a href="{{ route('matakuliah.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection

