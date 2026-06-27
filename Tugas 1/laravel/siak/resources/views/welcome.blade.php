<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <span class="text-xl font-bold">Aplikasi Akademik</span>
                <div class="space-x-4 text-sm">
                    <a href="{{ route('dosen.index') }}" class="hover:underline">Dosen</a>
                    <a href="{{ route('mahasiswa.index') }}" class="hover:underline">Mahasiswa</a>
                    <a href="{{ route('matakuliah.index') }}" class="hover:underline">Matakuliah</a>
                    <a href="{{ route('krs.index') }}" class="hover:underline">KRS</a>
                    <a href="{{ route('jadwal.index') }}" class="hover:underline">Jadwal</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang</h1>
            <p class="text-gray-600 mb-8">Aplikasi Manajemen Data Akademik Sederhana</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 max-w-5xl mx-auto">
                <a href="{{ route('dosen.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-3xl mb-2">👨‍🏫</div>
                    <h3 class="font-bold text-lg">Dosen</h3>
                    <p class="text-gray-500 text-sm">Kelola data dosen</p>
                </a>
                <a href="{{ route('mahasiswa.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-3xl mb-2">🎓</div>
                    <h3 class="font-bold text-lg">Mahasiswa</h3>
                    <p class="text-gray-500 text-sm">Kelola data mahasiswa</p>
                </a>
                <a href="{{ route('matakuliah.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-3xl mb-2">📚</div>
                    <h3 class="font-bold text-lg">Matakuliah</h3>
                    <p class="text-gray-500 text-sm">Kelola data matakuliah</p>
                </a>
                <a href="{{ route('krs.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-3xl mb-2">📝</div>
                    <h3 class="font-bold text-lg">KRS</h3>
                    <p class="text-gray-500 text-sm">Kelola data KRS</p>
                </a>
                <a href="{{ route('jadwal.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                    <div class="text-3xl mb-2">📅</div>
                    <h3 class="font-bold text-lg">Jadwal</h3>
                    <p class="text-gray-500 text-sm">Kelola data jadwal</p>
                </a>
            </div>
        </div>
    </main>
</body>
</html>

