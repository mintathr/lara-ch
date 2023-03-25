<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPengurusToJematsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jemats', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('nama_lengkap');
            $table->enum('pengurus_pa', ['y', 't'])->default('t')->after('keterangan');
            $table->enum('pengurus_pt', ['y', 't'])->default('t')->after('pengurus_pa');
            $table->enum('pengurus_gp', ['y', 't'])->default('t')->after('pengurus_pt');
            $table->enum('pengurus_pkp', ['y', 't'])->default('t')->after('pengurus_gp');
            $table->enum('pengurus_pkb', ['y', 't'])->default('t')->after('pengurus_pkp');
            $table->enum('pengurus_pklu', ['y', 't'])->default('t')->after('pengurus_pkb');
            $table->enum('pelayan_pa', ['y', 't'])->default('t')->after('pengurus_pklu');
            $table->enum('pelayan_pt', ['y', 't'])->default('t')->after('pelayan_pa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jemats', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('pengurus_pa');
            $table->dropColumn('pengurus_pt');
            $table->dropColumn('pengurus_gp');
            $table->dropColumn('pengurus_pkp');
            $table->dropColumn('pengurus_pkb');
            $table->dropColumn('pengurus_pklu');
            $table->dropColumn('pelayan_pa');
            $table->dropColumn('pelayan_pt');
        });
    }
}
