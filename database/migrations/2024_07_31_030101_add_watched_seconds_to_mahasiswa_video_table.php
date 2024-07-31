<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWatchedSecondsToMahasiswaVideoTable extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa_video', function (Blueprint $table) {
            $table->integer('watched_seconds')->default(0); // Menyimpan detik yang telah ditonton
        });
    }

    public function down()
    {
        Schema::table('mahasiswa_video', function (Blueprint $table) {
            $table->dropColumn('watched_seconds');
        });
    }
}
