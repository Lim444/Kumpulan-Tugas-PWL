@extends('layouts.app')

@section('title', 'Data KRS')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Data KRS</h2>
        <a href="{{ route('krs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah KRS</a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Mahasiswa</th>
                <th class="border px-4 py-2 text-left">Matakuliah</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($krs as $item)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $item->id }}</td>
                <td class="border px-4 py-2">{{ $item->mahasiswa->nama ?? '-' }} ({{ $item->npm }})</td>
                <td class="border px-4 py-2">{{ $item->matakuliah->nama_matakuliah ?? '-' }} ({{ $item->kode_matakuliah }})</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('krs.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-4 text-center text-gray-500">Belum ada data KRS</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

