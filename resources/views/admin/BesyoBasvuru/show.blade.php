@extends('admin.layout.layout')
@section('content')
    <div class="card mb-3" >{{--    style="max-width: 540px;"--}}
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/BesyoBasvuru/images/'.$besyobasvuru->profil_resmi)}}" class=" w-100 img-fluid " alt="{{$besyobasvuru->name}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$besyobasvuru->name}}&nbsp;Başvurusu</h5>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>TC:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->tc}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Isim:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->isim}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Soy Isim:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->soy_isim}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Cinsiyet:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->cinsiyet}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Dogum Tarihi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->dogum_tarihi}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Dogum Yeri:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->dogum_yeri}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Uyruk:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->uyruk}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Telefon numarası:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="tel:{{$besyobasvuru->telefon}}">{{$besyobasvuru->telefon}}</a></p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Email:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="mailto:{{$besyobasvuru->email}}"{{$besyobasvuru->email}}>{{$besyobasvuru->email}}</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Adres:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->adres}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Okul Adi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->okul_adı}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Bolum Adi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->bolum_adı}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Egitim Durumu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->egitim_durumu}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Engel Durumu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->engel_durumu?'evet':'hayır'}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Ayni Alan:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->aynı_alan?'evet':'hayır'}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Profil Resmi:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/BesyoBasvuru/images/'.$besyobasvuru->profil_resmi)}}">Göster</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Osym Dosyasi:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/BesyoBasvuru/osym/'.$besyobasvuru->osym_dosyasi)}}">Göster</a></p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Engel Durum Raporu:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/BesyoBasvuru/engelDurumRaporu/'.$besyobasvuru->engel_durum_raporu)}}">Göster</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Durum:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->durum}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Durum Notu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$besyobasvuru->durum_notu}}</p>
                    </div>

                    <p class="card-text"><small class="text-muted">{{$besyobasvuru->created_at?->diffForHumans()}}&nbsp;oluşturulmuş</small></p>
                </div>
            </div>

        </div>
    </div>
@endsection

