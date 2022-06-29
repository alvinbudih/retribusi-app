<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->char("no_uji", 15)->unique();
            $table->char("no_kendaraan", 9)->unique();
            $table->string("no_mesin")->unique();
            $table->string("no_rangka")->unique();
            $table->string("srut")->unique();
            $table->date("awal_daftar");
            $table->date("jatuh_tempo");
            $table->integer("jbb");
            $table->unsignedInteger("tahun_buat");
            $table->string("jenis_rumah");
            $table->string("sifat");
            $table->string("bahan_bakar");
            $table->string("bahan_karoseri");
            $table->integer("cc");
            $table->foreignId("pemilik_id");
            $table->foreignId("tipe_kendaraan_id");
            $table->foreignId("jenis_kendaraan_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
