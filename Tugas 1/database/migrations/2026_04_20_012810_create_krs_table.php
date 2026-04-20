<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->char('npm', 10)->references('npm')->on('mahasiswa')->onDelete('cascade');
            $table->char('kode_matakuliah', 8)->references('kode_matakuliah')->on('matakuliah')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
