@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->nidn) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">NIDN</label>
<input type="text" value="{{ $dosen->nidn }}" class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-900" disabled>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama</label>
<input type="text" name="nama" value="{{ $dosen->nama }}" maxlength="50" class="w-full border rounded px-3 py-2 text-gray-900 bg-white" required>
            @error('nama')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-between">
            <a href="{{ route('dosen.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection

