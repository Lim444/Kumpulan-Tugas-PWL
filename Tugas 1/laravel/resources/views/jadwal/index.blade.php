@extends('layouts.app')

@section('title', 'Data Jadwal')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Data Jadwal</h2>
        <a href="{{ route('jadwal.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Jadwal</a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Matakuliah</th>
                <th class="border px-4 py-2 text-left">Dosen</th>
                <th class="border px-4 py-2 text-left">Kelas</th>
                <th class="border px-4 py-2 text-left">Hari</th>
                <th class="border px-4 py-2 text-left">Jam</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwals as $j)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $j->id }}</td>
                <td class="border px-4 py-2">{{ $j->matakuliah->nama_matakuliah ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $j->dosen->nama ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $j->kelas }}</td>
                <td class="border px-4 py-2">{{ $j->hari }}</td>
                <td class="border px-4 py-2">{{ $j->jam }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('jadwal.edit', $j->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="border px-4 py-4 text-center text-gray-500">Belum ada data jadwal</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

