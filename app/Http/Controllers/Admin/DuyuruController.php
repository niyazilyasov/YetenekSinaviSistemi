<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DuyuruCreateRequest;
use App\Http\Requests\DuyuruEditProfileRequest;
use App\Http\Requests\DuyuruEditRequest;
use App\Models\Duyuru;
use DataTables;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Image;

class DuyuruController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ConfirmsPasswords;
    public function index()
    {
        return view('admin.duyuru.index');
    }

    public function edit(Duyuru $duyurus)
    {

        return view('admin.duyuru.edit',compact(['duyurus']));
    }
    
    public function update(DuyuruCreateRequest $request)
    {


        $duyurus=Duyuru::findOrFail($request->id);
        $values=$request->except(['id','image_url','password']);
        $duyurus->update($values);
       
        $duyurus->save();
        
        return back()->with('success', 'Değişikleriniz başarıyla tamamlandı.');


    }
    public function create(){
        return view('admin.duyuru.create');

    }
    public function get_data()
    {
        return Datatables::of(Duyuru::query()->select(
            [
                'id',
                'baslik',
                'icerik',
                'created_at',
            ]))->make();
    }
    public function store(DuyuruCreateRequest $request){
        $values=$request->except(['id']);   
        $duyurus=Duyuru::make($values);
        $duyurus->save();
       return back()->with('success', 'Başarıyla eklendi.');


    }
    public function show(Duyuru $duyurus){

        return view('admin.duyuru.show',compact('duyurus'));
    }
    public function delete(Duyuru $duyurus){

        return response($duyurus->delete());
    }

   
   

}
