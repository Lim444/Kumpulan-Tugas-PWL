<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        // Seed data untuk dosen
        for ($i = 0; $i < 10; $i++) {
            DB::table('dosen')->insert([
                'nidn' => $faker->unique()->numerify('Dosen-#####'),
                'nama' => $faker->name(),
            ]);
        }
        // Seed data untuk mahasiswa
        for ($i = 0; $i < 50; $i++) {
            DB::table('mahasiswa')->insert([
                'npm' => $faker->unique()->numerify('Mhs-#####'),
                'nidn' => $faker->randomElement(DB::table('dosen')->pluck('nidn')->toArray()),
                'nama' => $faker->name(),
            ]);
        }
        // Seed data untuk matakuliah
        for ($i = 0; $i < 20; $i++) {
            DB::table('matakuliah')->insert([
                'kode_matakuliah' => $faker->unique()->bothify('MK-???'),
                'nama_matakuliah' => $faker->word(),
            ]);
        }
        // Seed data untuk jadwal
        for ($i = 0; $i < 30; $i++) {
            DB::table('jadwal')->insert([
                'kode_matakuliah' => $faker->randomElement(DB::table('matakuliah')->pluck('kode_matakuliah')->toArray()),
                'nidn' => $faker->randomElement(DB::table('dosen')->pluck('nidn')->toArray()),
            ]);
        }
    }
}