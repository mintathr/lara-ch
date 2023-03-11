<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinceToJematsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jemats', function (Blueprint $table) {
            $table->string('handphone', 13)->after('hubungan_keluarga');
            $table->char('province_id', 2)->after('sektor');
            $table->char('regency_id', 4)->after('province_id');
            $table->char('district_id', 7)->after('regency_id');
            $table->char('village_id', 10)->after('district_id');
            $table->string('alamat')->after('village_id');
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
            //
        });
    }
}
