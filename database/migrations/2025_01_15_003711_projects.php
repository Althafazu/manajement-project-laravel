<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('prj_id');
            $table->string('prj_no_spk', 50)->unique();
            $table->string('prj_nama', 100);
            $table->enum('prj_jenis', ['Internal', 'Eksternal'])->default('Internal');
            $table->enum('prj_status', ['Sedang Berlangsung', 'Selesai', 'Batal'])->default('Sedang Berlangsung');
            $table->datetime('prj_start_date');
            $table->datetime('prj_deadline');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};