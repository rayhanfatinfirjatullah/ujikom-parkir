<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id('id_parkir'); // int(11) 
            $table->foreignId('id_kendaraan')->constrained('tb_kendaraan', 'id_kendaraan'); // int(11) [cite: 37]
            $table->dateTime('waktu_masuk'); // datetime [cite: 41]
            $table->dateTime('waktu_keluar')->nullable(); // datetime [cite: 45]
            $table->foreignId('id_tarif')->constrained('tb_tarif', 'id_tarif'); // int(11) [cite: 46]
            $table->integer('durasi_jam')->nullable(); // int(5) [cite: 47]
            $table->decimal('biaya_total', 10, 0)->default(0); // decimal(10,0) [cite: 49]
            $table->enum('status', ['masuk', 'keluar', '']); // enum [cite: 50]
            $table->foreignId('id_user')->constrained('users'); // int(11) 
            $table->foreignId('id_area')->constrained('tb_area_parkir', 'id_area'); // int(11) [cite: 52]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
