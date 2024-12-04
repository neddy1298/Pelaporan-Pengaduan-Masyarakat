<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->increments('id_pengaduan');
            $table->date('tgl_pengaduan');
            $table->char('nik', 16);
            $table->text('judul');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
