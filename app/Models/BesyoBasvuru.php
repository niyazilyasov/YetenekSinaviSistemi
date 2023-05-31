<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\BesyoBasvuru
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
 * @property string $profil_resmi
 * @property string $osym_dosyasi
 * @property string $engel_durum_raporu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Database\Factories\BesyoBasvuruFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru query()
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereAdres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereAynıAlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereBolumAdı($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereCinsiyet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereDogumTarihi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereDogumYeri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereEgitimDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereEngelDurumRaporu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereEngelDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereIsim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereOkulAdı($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereOsymDosyasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereProfilResmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereSoyIsim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereTC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereTelefon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereUyruk($value)
 * @mixin \Eloquent
 * @property string $tc
 * @property string $dogum_tarihi
 * @property string $uyruk
 * @property string $telefon
 * @property string $bolum_adı
 * @property string $durum
 * @property string|null $durum_notu
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BesyoBasvuru whereDurumNotu($value)
 */
class BesyoBasvuru extends Model
{
    use HasFactory;
    public const BASVUR_DURUMU = ['onaylandı', 'reddedildi', 'değerlendirilmedi'];
    public const CINSIYET = ['erkek', 'kadın'];
    public const UYRUK = ['TC', 'yabancı'];
    public const EGITIM_DURUMU = ['ilk', 'orta', 'lise', 'lisans', 'yükseklisans'];
    const REDDEDILDI = 'reddedildi';
    const ONAYLANDI = 'onaylandı';
    protected $table = 'BesyoBasvuru';
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
