<?php

namespace Database\Factories;

use App\Models\BesyoBasvuru;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BesyoBasvuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path=\Storage::path('public\\BesyoBasvuru\\thumbnail');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $imageName='image'.$this->faker->numberBetween(0,1000).'.jpeg';
        $path.='\\'.$imageName;
        FactoryHelper::saveRandomImage($path,128,128);
        $path=\Storage::path('public\\BesyoBasvuru\\images');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path.='\\'.$imageName;
        FactoryHelper::saveRandomImage($path,640,480);
        return [
            'tc' =>fake()->numberBetween(21534953534,91534953534),
            'isim' =>fake()->firstName(),
            'soy_isim'=>fake()->lastName(),
            'cinsiyet'=>fake()->shuffleArray(BesyoBasvuru::CINSIYET)[0],
            'dogum_tarihi'=>fake()->date,
            'dogum_yeri'=>fake()->city,
            'uyruk'=>fake()->shuffleArray(BesyoBasvuru::UYRUK)[0],
            'telefon'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'adres'=>fake()->address(),
            'okul_adı'=>fake()->name(),
            'bolum_adı'=>fake()->name(),
            'egitim_durumu'=>fake()->shuffleArray(BesyoBasvuru::EGITIM_DURUMU)[0],
            'engel_durumu'=>fake()->boolean(),
            'aynı_alan'=>fake()->boolean(),
            'profil_resmi'=>$imageName,
            'osym_dosyasi'=>$imageName,
            'engel_durum_raporu'=>$imageName,
            'durum'=>fake()->shuffleArray(BesyoBasvuru::BASVUR_DURUMU)[0],
            'durum_notu'=>null,
            'created_at'=>fake()->date(),
            'updated_at'=>fake()->date(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
