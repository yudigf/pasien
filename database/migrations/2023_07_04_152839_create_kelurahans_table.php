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
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kelurahan');
            $table->string('nama_kecamatan');
            $table->string('nama_kota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropColumn('nama_kelurahan');
            $table->dropColumn('nama_kecamatan');
            $table->dropColumn('nama_kota');
            $table->dropTimestamps();
        });
    }
};
