<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Duyuru;

class DuyuruSayfasiController extends Controller
{
    public function duyurusayfasi($id){
       $duyuru =Duyuru::findOrFail($id);
       return view('duyuruSayfasi',['duyuru'=>$duyuru]);
    }

}
