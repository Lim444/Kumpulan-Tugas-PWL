@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Jadwal</h2>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Matakuliah</label>
<select name="kode_matakuliah" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($matakuliahs as $mk)
                <option value="{{ $mk->kode_matakuliah }}" {{ $jadwal->kode_matakuliah == $mk->kode_matakuliah ? 'selected' : '' }}>{{ $mk->kode_matakuliah }} - {{ $mk->nama_matakuliah }}</option>
                @endforeach
            </select>
            @error('kode_matakuliah')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Dosen</label>
<select name="nidn" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                <option value="{{ $dosen->nidn }}" {{ $jadwal->nidn == $dosen->nidn ? 'selected' : '' }}>{{ $dosen->nidn }} - {{ $dosen->nama }}</option>
                @endforeach
            </select>
            @error('nidn')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kelas</label>
            <select name="kelas" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="A" {{ $jadwal->kelas == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $jadwal->kelas == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $jadwal->kelas == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $jadwal->kelas == 'D' ? 'selected' : '' }}>D</option>
            </select>
            @error('kelas')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Hari</label>
            <select name="hari" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
                <option value="">-- Pilih Hari --</option>
                <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
            </select>
            @error('hari')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jam Mulai</label>
<input type="time" name="jam" value="{{ $jadwal->jam }}" min="08:00" max="20:00" step="60" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
            @error('jam')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jam Selesai</label>
            <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" min="08:00" max="20:00" step="60" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
            @error('jam_selesai')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-between">
            <a href="{{ route('jadwal.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection

