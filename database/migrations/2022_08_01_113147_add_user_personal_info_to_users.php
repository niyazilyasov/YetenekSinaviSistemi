<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ad')->nullable();
            $table->string('soyad')->nullable();
            $table->string('telefon')->nullable();
            $table->string('tc_numarasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ad');
            $table->dropColumn('soyad');
            $table->dropColumn('telefon');
            $table->dropColumn('tc_numarasi');

        });
    }
};
