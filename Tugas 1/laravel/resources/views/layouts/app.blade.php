<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Akademik')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="/" class="text-xl font-bold">Aplikasi Akademik</a>
                <div class="space-x-4 text-sm">
                    <a href="/" class="hover:underline">Beranda</a>
                    <a href="{{ route('dosen.index') }}" class="hover:underline">Dosen</a>
                    <a href="{{ route('mahasiswa.index') }}" class="hover:underline">Mahasiswa</a>
                    <a href="{{ route('matakuliah.index') }}" class="hover:underline">Matakuliah</a>
                    <a href="{{ route('krs.index') }}" class="hover:underline">KRS</a>
                    <a href="{{ route('jadwal.index') }}" class="hover:underline">Jadwal</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>

