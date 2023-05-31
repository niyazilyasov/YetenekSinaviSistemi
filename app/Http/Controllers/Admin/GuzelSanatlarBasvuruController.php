<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuzelSanatlarBasvuruEditRequest;
use App\Models\GuzelSanatlarBasvuru;
use DataTables;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Image;

class GuzelSanatlarBasvuruController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        return view('admin.guzelSanatlarBasvuru.index');
    }
    public function onayla(GuzelSanatlarBasvuru $guzelSanatlarBasvuru)
    {
        $guzelSanatlarBasvuru->durum=GuzelSanatlarBasvuru::ONAYLANDI;
        return view('admin.guzelSanatlarBasvuru.edit',compact(['guzelSanatlarBasvuru']));
    }
    public function reddet(GuzelSanatlarBasvuru $guzelSanatlarBasvuru)
    {
        $guzelSanatlarBasvuru->durum=GuzelSanatlarBasvuru::REDDEDILDI;
        return view('admin.guzelSanatlarBasvuru.edit',compact(['guzelSanatlarBasvuru']));
    }
    public function update(GuzelSanatlarBasvuruEditRequest $request)
    {


        $guzelSanatlarBasvuru=GuzelSanatlarBasvuru::findOrFail($request->id);
        $values=$request->except(['id']);
        $guzelSanatlarBasvuru->update($values);
        $guzelSanatlarBasvuru->save();
        return back()->with('success', 'Değişikleriniz başaeıyla tamamlandı.');


    }
    public function create(){
        return view('admin.guzelSanatlarBasvuru.create');

    }
    public function show(GuzelSanatlarBasvuru $guzelSanatlarBasvuru){

        return view('admin.guzelSanatlarBasvuru.show',compact('guzelSanatlarBasvuru'));
    }
    public function delete(GuzelSanatlarBasvuru $guzelSanatlarBasvuru){

        return response($guzelSanatlarBasvuru->delete());
    }
    public function get_data()
    {
        return Datatables::of(GuzelSanatlarBasvuru::query()->select(
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
                'basvuru_tercih_1',
                'basvuru_tercih_2',
                'basvuru_tercih_3',
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
