<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use  App\Models\Duyuru;
class DuyuruController extends BaseController
{

    public function duyurularController()
    {
        return view('duyurularController');
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Request $request){

        $rules=[
            'baslik'=>'required|string',
            'icerik'=>'required|text'
        ];
        $validator=Validator ::make($request->all(),$rules);

        if ($validator->fails()) {
            dd($validator);
            return redirect('duyurularController')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();


        
             $duyurularSayfasi= new duyurular;
             $duyurularSayfasi->baslik = $data['baslik'];
             $duyurularSayfasi->icerik = $data['icerik'];
             $duyurularSayfasi->save();
            
    }

}

}
