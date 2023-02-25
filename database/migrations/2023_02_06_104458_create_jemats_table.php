<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJematsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemats', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_keluarga', false, true)->nullable()->length(4)->zerofill();
            $table->string('no_induk', 20)->unique();
            $table->string('nama_lengkap');
            $table->string('nama_keluarga');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('hubungan_keluarga', ['KK', 'IS', 'AN', 'OT', 'CU', 'KA', 'MN', 'FA']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('tempat_baptis')->nullable();
            $table->date('tgl_baptis')->nullable();
            $table->string('tempat_sidi')->nullable();
            $table->date('tgl_sidi')->nullable();
            $table->date('tgl_nikah_gereja')->nullable();
            $table->date('tgl_nikah_sipil')->nullable();
            $table->enum('golongan_darah', ['O', 'A', 'B', 'AB'])->nullable();
            $table->string('pendidikan_terakhir', 5)->nullable();
            $table->string('status_pelkat', 5);
            $table->enum('sektor', [1, 2]);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jemats CHANGE kode_keluarga kode_keluarga INT(4) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jemats');
    }
}
