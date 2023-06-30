<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresbitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbiters', function (Blueprint $table) {
            $table->id();
            $table->integer('jemat_id', false, true);
            $table->string('filename');
            $table->string('link_fb')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->integer('periode', false, true)->length(4);
            $table->enum('status', ['Diaken', 'Majelis', 'Theologi', 'Germasa', 'PPSDI', 'PEG', 'IL']);
            $table->string('status_phm')->nullable();
            $table->string('keterangan');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE presbiters CHANGE jemat_id jemat_id INT(11) NOT NULL');
        DB::statement('ALTER TABLE presbiters CHANGE periode periode INT(4) NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presbiters');
    }
}
