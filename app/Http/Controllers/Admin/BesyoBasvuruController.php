<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BesyoBasvuruEditRequest;
use App\Models\BesyoBasvuru;
use DataTables;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Image;

class BesyoBasvuruController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        return view('admin.BesyoBasvuru.index');
    }
    public function onayla( $id)
    {
        $besyobasvuru=\App\Models\BesyoBasvuru::find($id);
        $besyobasvuru->durum=BesyoBasvuru::ONAYLANDI;
        return view('admin.BesyoBasvuru.edit',compact(['besyobasvuru']));
    }
    public function reddet($id)
    {
        $besyobasvuru=\App\Models\BesyoBasvuru::find($id);
        $besyobasvuru->durum=BesyoBasvuru::REDDEDILDI;
        return view('admin.BesyoBasvuru.edit',compact(['besyobasvuru']));
    }
    public function update(BesyoBasvuruEditRequest $request)
    {


        $besyobasvuru=BesyoBasvuru::findOrFail($request->id);
        $values=$request->except(['id']);
        $besyobasvuru->update($values);
        $besyobasvuru->save();
        return back()->with('success', 'Değişikleriniz başarıyla tamamlandı.');


    }
    public function create(){
        return view('admin.BesyoBasvuru.create');

    }
    public function show($id){
        $besyobasvuru=\App\Models\BesyoBasvuru::find($id);
        return view('admin.BesyoBasvuru.show',compact('besyobasvuru'));
    }
    public function delete($id){

        $besyobasvuru=\App\Models\BesyoBasvuru::find($id);

        return response($besyobasvuru->delete());
    }
    public function get_data()
    {
        return Datatables::of(BesyoBasvuru::query()->select(
            [
                'id',
                'tc',
                'isim',
                'soy_isim',
                'cinsiyet',
                'dogum_tarihi',
                'dogum_yeri',
                'uyruk',
                'telefon',
                'email',
                'okul_adı',
                'bolum_adı',
                'egitim_durumu',
                'engel_durumu',
                'aynı_alan',
                'profil_resmi',
                'durum',
            ]))->make();
    }

    /**
     * @param \Request $request
     * @return string
     */
    public function saveImage( $request)
    {
        $originalImage = $request->file('file_name');
        $thumbnailImage = Image::make($originalImage);
        list($thumbnailPath, $originalPath) = $this->getPaths();
        $thumbnailImage->resize(640, 480);
        $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $thumbnailImage->resize(128, 128);
        $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());
        return time().$originalImage->getClientOriginalName();
    }
    public function removeImage( $image_url)
    {
        list($thumbnailPath, $originalPath) = $this->getPaths();
        if (file_exists($thumbnailPath.$image_url)) {
            unlink($thumbnailPath.$image_url);
        }
        if (file_exists($originalPath.$image_url)) {
            unlink($originalPath.$image_url);
        }
    }

    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        $thumbnailPath = \Storage::path('public\\thumbnail\\');
        $originalPath = \Storage::path('public\\images\\');
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
        }
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0777, true);
        }
        return array($thumbnailPath, $originalPath);
    }

}
