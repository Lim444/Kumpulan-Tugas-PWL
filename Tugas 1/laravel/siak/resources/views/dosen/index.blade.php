@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Data Dosen</h2>
        <a href="{{ route('dosen.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Dosen</a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">NIDN</th>
                <th class="border px-4 py-2 text-left">Nama</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dosens as $dosen)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $dosen->nidn }}</td>
                <td class="border px-4 py-2">{{ $dosen->nama }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('dosen.edit', $dosen->nidn) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('dosen.destroy', $dosen->nidn) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="border px-4 py-4 text-center text-gray-500">Belum ada data dosen</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

