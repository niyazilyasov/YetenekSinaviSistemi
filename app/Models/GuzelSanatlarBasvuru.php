<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GuzelSanatlarBasvuru
 *
 * @property int $id
 * @property string $TC
 * @property string $isim
 * @property string $soy_isim
 * @property int $cinsiyet
 * @property string $Dogum_tarihi
 * @property string $dogum_yeri
 * @property int $Uyruk
 * @property string $Telefon
 * @property string $email
 * @property string $adres
 * @property string $okul_adı
 * @property string $Bolum_adı
 * @property int $egitim_durumu
 * @property int $engel_durumu
 * @property int $aynı_alan
 * @property int $basvuru_tercih_1
 * @property int $basvuru_tercih_2
 * @property int $basvuru_tercih_3
 * @property string $profil_resmi
 * @property string $osym_dosyasi
 * @property string $engel_durum_raporu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\GuzelSanatlarBasvuruFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereAdres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereAynıAlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereBasvuruTercih1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereBasvuruTercih2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereBasvuruTercih3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereBolumAdı($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereCinsiyet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereDogumTarihi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereDogumYeri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereEgitimDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereEngelDurumRaporu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereEngelDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereIsim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereOkulAdı($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereOsymDosyasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereProfilResmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereSoyIsim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereTC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereTelefon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereUyruk($value)
 * @mixin \Eloquent
 * @property string $tc
 * @property string $dogum_tarihi
 * @property string $uyruk
 * @property string $telefon
 * @property string $bolum_adı
 * @property string $durum
 * @property string|null $durum_notu
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuzelSanatlarBasvuru whereDurumNotu($value)
 */
class GuzelSanatlarBasvuru extends Model
{
    use HasFactory;
    public const BASVUR_DURUMU = ['onaylandı', 'reddedildi', 'değerlendirilmedi'];
    public const CINSIYET = ['erkek', 'kadın'];
    public const UYRUK = ['TC', 'yabancı'];
    public const EGITIM_DURUMU = ['ilk', 'orta', 'lise', 'lisans', 'yükseklisans'];
    public const TERCIH = ['Grafik Sanatlar', 'Heykel', 'Resim', 'Tekstil ve Moda Tasarımı', 'Seramik'];
    const REDDEDILDI = 'reddedildi';
    const ONAYLANDI = 'onaylandı';
    protected $table = 'guzel_sanatlar_basvurus';
    protected $fillable=[
        'tc',
        'isim',
        'soy_isim',
        'cinsiyet',
        'dogum_tarihi',
        'dogum_yeri',
        'uyruk',
        'telefon',
        'email',
        'adres',
        'okul_adı',
        'bolum_adı',
        'egitim_durumu',
        'engel_durumu',
        'aynı_alan',
        'basvuru_tercih_1',
        'basvuru_tercih_2',
        'basvuru_tercih_3',
        'profil_resmi',
        'osym_dosyasi',
        'engel_durum_raporu',
        'durum',
        'durum_notu',
    ];
    public function getNameAttribute(){
        return $this->isim.' '.$this->soy_isim;
    }
}
