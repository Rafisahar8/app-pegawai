<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Hapus kolom lama (jika masih pakai nama teks)
            if (Schema::hasColumn('employees', 'jabatan')) {
                $table->dropColumn('jabatan');
            }
            if (Schema::hasColumn('employees', 'departemen')) {
                $table->dropColumn('departemen');
            }

            // Tambah foreign key baru
            $table->unsignedBigInteger('jabatan_id')->nullable()->after('tanggal_masuk');
            $table->unsignedBigInteger('departemen_id')->nullable()->after('jabatan_id');

            $table->foreign('jabatan_id')->references('id')->on('positions')->onDelete('set null');
            $table->foreign('departemen_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['jabatan_id']);
            $table->dropForeign(['departemen_id']);
            $table->dropColumn(['jabatan_id', 'departemen_id']);
        });
    }
};
