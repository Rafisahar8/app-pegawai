<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
}



    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
