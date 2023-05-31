<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Model;


class Duyuru extends Model
{
   //use HasFactory;
   protected $table = 'duyurus';
   protected $fillable=[
   
   'baslik',
   'icerik',

   ];

}
