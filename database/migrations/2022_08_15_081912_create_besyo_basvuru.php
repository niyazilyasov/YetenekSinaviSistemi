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
        Schema::create('BesyoBasvuru', function (Blueprint $table) {
            $table->id();
            $table->string('tc')->unique();
            $table->string('isim');
            $table->string('soy_isim');
            $table->enum('cinsiyet', \App\Models\BesyoBasvuru::CINSIYET);
            $table->date('dogum_tarihi');
            $table->string('dogum_yeri');
            $table->enum('uyruk', \App\Models\BesyoBasvuru::UYRUK);
            $table->string('telefon')->unique();
            $table->string('email')->unique();
            $table->text('adres');
            $table->string('okul_adı');
            $table->string('bolum_adı');
            $table->enum('egitim_durumu', \App\Models\BesyoBasvuru::EGITIM_DURUMU);
            $table->boolean('engel_durumu');
            $table->boolean('aynı_alan');
            $table->string('profil_resmi');
            $table->string('osym_dosyasi');
            $table->string('engel_durum_raporu');
            $table->enum('durum', \App\Models\BesyoBasvuru::BASVUR_DURUMU)->nullable(false)->default(\App\Models\BesyoBasvuru::BASVUR_DURUMU[2]);
            $table->string('durum_notu')->nullable();
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
        Schema::dropIfExists('BesyoBasvuru');
    }
};
