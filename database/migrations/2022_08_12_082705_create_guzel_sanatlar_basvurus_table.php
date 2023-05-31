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
        Schema::create('guzel_sanatlar_basvurus', function (Blueprint $table) {
            $table->id();
            $table->string('tc')->unique();
            $table->string('isim');
            $table->string('soy_isim');
            $table->enum('cinsiyet', \App\Models\GuzelSanatlarBasvuru::CINSIYET);
            $table->date('dogum_tarihi');
            $table->string('dogum_yeri');
            $table->enum('uyruk', \App\Models\GuzelSanatlarBasvuru::UYRUK);
            $table->string('telefon')->unique();
            $table->string('email')->unique();
            $table->text('adres');
            $table->string('okul_adı');
            $table->string('bolum_adı');
            $table->enum('egitim_durumu', \App\Models\GuzelSanatlarBasvuru::EGITIM_DURUMU);
            $table->boolean('engel_durumu');
            $table->boolean('aynı_alan');
            $table->enum('basvuru_tercih_1', \App\Models\GuzelSanatlarBasvuru::TERCIH)->nullable();
            $table->enum('basvuru_tercih_2', \App\Models\GuzelSanatlarBasvuru::TERCIH)->nullable();
            $table->enum('basvuru_tercih_3', \App\Models\GuzelSanatlarBasvuru::TERCIH)->nullable();
            $table->string('profil_resmi');
            $table->string('osym_dosyasi');
            $table->string('engel_durum_raporu');
            $table->enum('durum', \App\Models\GuzelSanatlarBasvuru::BASVUR_DURUMU)->nullable(false)->default(\App\Models\GuzelSanatlarBasvuru::BASVUR_DURUMU[2]);
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
        Schema::dropIfExists('guzel_sanatlar_basvurus');
    }
};
