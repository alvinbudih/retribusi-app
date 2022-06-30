<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->char("kd_bayar", 11);
            $table->double("jumlah");
            $table->boolean("telah_bayar")->default(false);
            $table->date("tgl_bayar");
            $table->foreignId("pendaftaran_id")->unique();
            $table->foreignId("user_id");
            $table->foreignId("biaya_id");
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
        Schema::dropIfExists('pembayaran');
    }
}
