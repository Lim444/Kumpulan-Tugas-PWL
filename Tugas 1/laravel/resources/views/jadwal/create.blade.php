@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Jadwal</h2>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
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
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Dosen</label>
            <select name="nidn" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                <option value="{{ $dosen->nidn }}">{{ $dosen->nidn }} - {{ $dosen->nama }}</option>
                @endforeach
            </select>
            @error('nidn')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kelas</label>
            <input type="text" name="kelas" maxlength="1" class="w-full border rounded px-3 py-2" required>
            @error('kelas')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Hari</label>
            <input type="text" name="hari" maxlength="10" class="w-full border rounded px-3 py-2" required>
            @error('hari')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jam</label>
            <input type="time" name="jam" class="w-full border rounded px-3 py-2" required>
            @error('jam')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-between">
            <a href="{{ route('jadwal.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection

