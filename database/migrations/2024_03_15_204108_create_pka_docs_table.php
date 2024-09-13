<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkaDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pka_docs', function (Blueprint $table) {
            $table->id();
            $table->string('no_pka', 15)->unique();
            $table->string('nama_program');
            $table->string('tujuan')->nullable();
            $table->string('pjp', 10)->nullable();
            $table->string('penopang_program', 70)->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('kualitatif')->nullable();
            $table->string('kuantitatif')->nullable();
            $table->double('penerimaan', 14, 2);
            $table->double('pengeluaran', 14, 2);
            $table->text('keterangan')->nullable();
            $table->string('sheet_komisi', 10);
            $table->enum('program', ['Rutin', 'Non Rutin', 'Proyek']);
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
        Schema::dropIfExists('pka_docs');
    }
}
