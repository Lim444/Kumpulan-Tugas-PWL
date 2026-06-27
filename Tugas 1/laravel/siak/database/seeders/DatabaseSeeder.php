<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        // TABEL DOSEN
        for ($i = 0; $i < 10; $i++) {
            DB::table('dosen')->insert([
                'nidn' => $faker->unique()->numerify('#####'),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // TABEL MAHASISWA
        $dosenList = DB::table('dosen')->pluck('nidn')->toArray();
        $kodeJurusan = '55201';
        for ($i = 0; $i < 50; $i++) {
            $angkatan = rand(21, 25);
            $urutan = str_pad($i, 3, '0', STR_PAD_LEFT);
            $npm = $kodeJurusan . $angkatan . $urutan;
            DB::table('mahasiswa')->insert([
                'npm' => $npm,
                'nidn' => $faker->randomElement($dosenList),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // TABEL MATAKULIAH
        for ($i = 0; $i < 20; $i++) {
            DB::table('matakuliah')->insert([
                'kode_matakuliah' => $faker->unique()->bothify('IF#####'),
                'nama_matakuliah' => $faker->word(),
                'sks' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Ambil data untuk relasi
        $matkuls = DB::table('matakuliah')->select('kode_matakuliah', 'sks')->get()->toArray();
        // TABEL JADWAL
        for ($i = 0; $i < 30; $i++) {
            $matkul = $faker->randomElement($matkuls);
            $durasiMenit = $matkul->sks * 50;
            $minStart = 8 * 60;
            $maxStart = (20 * 60) - $durasiMenit;
            $startMinutes = rand($minStart, $maxStart);
            $endMinutes = $startMinutes + $durasiMenit;

            $jamMulai = sprintf('%02d:%02d', intdiv($startMinutes, 60), $startMinutes % 60);
            $jamSelesai = sprintf('%02d:%02d', intdiv($endMinutes, 60), $endMinutes % 60);

            DB::table('jadwal')->insert([
                'kode_matakuliah' => $matkul->kode_matakuliah,
                'nidn' => $faker->randomElement($dosenList),
                'kelas' => $faker->randomElement(['A', 'B', 'C', 'D']),
                'hari' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']),
                'jam_mulai' => $jamMulai,
                'jam_selesai' => $jamSelesai,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
