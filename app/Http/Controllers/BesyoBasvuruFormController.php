<?php
namespace App\Http\Controllers;
use App\Models\BesyoBasvuru;
use DataTables;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Image;
class BesyoBasvuruFormController extends Controller
{
    public function besyobasvuruformu()
    {
        return view('besyobasvuruformu');
    }
    public function create(Request $request){



        $rules = [
            'tc' =>'required|int',
            'isim' => 'required|string|min:3|max:191',
            'soy_isim' => 'required|string|min:2|max:191',
            'cinsiyet' =>'required|string|max:10',
            'dogum_tarihi' => 'required|date',
            'dogum_yeri' => 'required|string|max:191',
            'uyruk' => 'required|string|max:191',
            'telefon' => 'required|numeric',
            'email' => 'required|string|email|max:191',
            'adres' => 'required|string|max:255',
            'okul_adı' => 'required|string|max:191',
            'bolum_adı' => 'required|string|max:191',
            'egitim_durumu' => 'required|string|max:191',
            'engel_durumu' => 'required|string',
            'aynı_alan' => 'required|string|max:191',
            'profil_resmi'  => 'required|max:2048',
            'osym_dosyasi' => 'required',
            'engel_durum_raporu' => 'required|max:2048',
        ];
        $validator = Validator::make($request->all(),$rules);


        if ($validator->fails()) {
            dd($validator);
            return redirect('besyobasvuruformu')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();

            try{
                list($thumbnailPath, $originalPath, $engelRaporuPath, $osymPath) = $this->getPaths();
                $fileNameP=null;
                $fileNameE=null;
                $fileNameO=null;
                if($request-> hasFile('profil_resmi'))
                {
                    $fileNameP = $this->saveImage($request, 'profil_resmi', $originalPath, $thumbnailPath, $data['tc']);
                    //$Pimage = $request->file('profil_resmi');
                    //$fileNameP = $data['tc'].'-'.rand(1,999);
                    //$filePathP = $originalPath  . $fileNameP;
                    //$pathP = Storage::disk('public')->put($filePathP, file_get_contents($request->profil_resmi));
                    //$pathP = Storage::disk('public')->url($pathP);
                }

                if($request-> hasFile('engel_durum_raporu'))
                {
                    $Eimage = $request->file('engel_durum_raporu');
                    $fileNameE = $data['tc'] . '-' . rand(1, 999) . ".".$Eimage->getClientOriginalExtension();
                    $filePathE = "BesyoBasvuru/engelDurumRaporu/" . $fileNameE;
                    $pathE = Storage::disk('public')->put($filePathE, file_get_contents($request->engel_durum_raporu));
                    $pathE = Storage::disk('public')->url($pathE);
                }

                if($request-> hasFile('osym_dosyasi'))
                {
                    $pdf = $request->file('osym_dosyasi');
                    $fileNameO = $data['tc'] . '-' . rand(1, 999) . ".".$pdf->getClientOriginalExtension();
                    $filePathO = "BesyoBasvuru/osym/" . $fileNameO;
                    $path = Storage::disk('public')->put($filePathO, file_get_contents($request->osym_dosyasi));
                    $path = Storage::disk('public')->url($path);
                }

                $besyobasvuru = new BesyoBasvuru;
                $besyobasvuru->tc = $data['tc'];
                $besyobasvuru->isim =    $data['isim'];
                $besyobasvuru->soy_isim = $data['soy_isim'];
                $besyobasvuru->cinsiyet = $data['cinsiyet'];
                $besyobasvuru->dogum_tarihi = $data['dogum_tarihi'];
                $besyobasvuru->dogum_yeri = $data['dogum_yeri'];
                $besyobasvuru->uyruk = $data['uyruk'];
                $besyobasvuru->telefon = $data['telefon'];
                $besyobasvuru->email = $data['email'];
                $besyobasvuru->adres = $data['adres'];
                $besyobasvuru->okul_adı = $data['okul_adı'];
                $besyobasvuru->bolum_adı = $data['bolum_adı'];
                $besyobasvuru->egitim_durumu = $data['egitim_durumu'];
                $besyobasvuru->engel_durumu = $data['engel_durumu'];
                $besyobasvuru->aynı_alan = $data['aynı_alan'];
                $besyobasvuru->profil_resmi = $fileNameP;
                $besyobasvuru->engel_durum_raporu =$fileNameE;
                $besyobasvuru->osym_dosyasi=$fileNameO;
                $besyobasvuru->save();
                return redirect('besyobasvuruformu')->with('success',"Yükleme Başarılı");
            }
            catch(Exception $e){
                dd($request);
                dd($e);
                return redirect('besyobasvuruformu')->with('failed',"Yükleme Başarısız");
            }
        }


    }
    public function saveImage($request, $fileName, $originalPath, $thumbnailPath,$tc)
    {
        $originalImage = $request->file($fileName);
        $thumbnailImage = Image::make($originalImage);
        $thumbnailImage->resize(640, 480);
        $name = $tc . '-' . rand(1, 999).$originalImage->getClientOriginalExtension();
        $thumbnailImage->save($originalPath . $name );
        $thumbnailImage->resize(128, 128);
        $thumbnailImage->save($thumbnailPath .  $name);
        return $name;
    }
    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        $thumbnailPath = \Storage::path('public\\BesyoBasvuru\\thumbnail\\');
        $originalPath = \Storage::path('public\\BesyoBasvuru\\images\\');
        $osymPath = \Storage::path('public\\BesyoBasvuru\\osym\\');
        $engelRaporuPath = \Storage::path('public\\BesyoBasvuru\\engelDurumRaporu\\');
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
        }
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0777, true);
        }
        if (!file_exists($osymPath)) {
            mkdir($osymPath, 0777, true);
        }
        if (!file_exists($engelRaporuPath)) {
            mkdir($engelRaporuPath, 0777, true);
        }
        return array($thumbnailPath, $originalPath,$engelRaporuPath,$osymPath);
    }

}
