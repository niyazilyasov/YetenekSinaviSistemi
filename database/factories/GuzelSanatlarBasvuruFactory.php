<?php

namespace Database\Factories;

use App\Models\GuzelSanatlarBasvuru;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class GuzelSanatlarBasvuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path=\Storage::path('public\\GuzelSanatlarBasvuru\\thumbnail');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $imageName='image'.$this->faker->numberBetween(0,1000).'.jpeg';
        $path.='\\'.$imageName;
        FactoryHelper::saveRandomImage($path,128,128);
        $path=\Storage::path('public\\GuzelSanatlarBasvuru\\images');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $path.='\\'.$imageName;
        FactoryHelper::saveRandomImage($path,640,480);
        return [
            'tc' =>fake()->numberBetween(21534953534,91534953534),
            'isim' =>fake()->firstName(),
            'soy_isim'=>fake()->lastName(),
            'cinsiyet'=>fake()->shuffleArray(GuzelSanatlarBasvuru::CINSIYET)[0],
            'dogum_tarihi'=>fake()->date,
            'dogum_yeri'=>fake()->city,
            'uyruk'=>fake()->shuffleArray(GuzelSanatlarBasvuru::UYRUK)[0],
            'telefon'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'adres'=>fake()->address(),
            'okul_adı'=>fake()->name(),
            'bolum_adı'=>fake()->name(),
            'egitim_durumu'=>fake()->shuffleArray(GuzelSanatlarBasvuru::EGITIM_DURUMU)[0],
            'engel_durumu'=>fake()->boolean(),
            'aynı_alan'=>fake()->boolean(),
            'basvuru_tercih_1'=>fake()->shuffleArray(GuzelSanatlarBasvuru::TERCIH)[0],
            'basvuru_tercih_2'=>fake()->shuffleArray(GuzelSanatlarBasvuru::TERCIH)[0],
            'basvuru_tercih_3'=>fake()->shuffleArray(GuzelSanatlarBasvuru::TERCIH)[0],
            'profil_resmi'=>$imageName,
            'osym_dosyasi'=>$imageName,
            'engel_durum_raporu'=>$imageName,
            'durum'=>fake()->shuffleArray(GuzelSanatlarBasvuru::BASVUR_DURUMU)[0],
            'durum_notu'=>"",
            'created_at'=>now(),
            'updated_at'=>now(),
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
