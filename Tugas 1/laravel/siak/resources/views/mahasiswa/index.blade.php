@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Data Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Mahasiswa</a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">NPM</th>
                <th class="border px-4 py-2 text-left">Nama</th>
                <th class="border px-4 py-2 text-left">Dosen Wali</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswas as $mhs)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $mhs->npm }}</td>
                <td class="border px-4 py-2">{{ $mhs->nama }}</td>
                <td class="border px-4 py-2">{{ $mhs->dosen->nama ?? '-' }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('mahasiswa.edit', $mhs->npm) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs->npm) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-4 text-center text-gray-500">Belum ada data mahasiswa</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

