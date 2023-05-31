@extends('admin.layout.layout')
@section('content')
    <div class="card mb-3" >{{--    style="max-width: 540px;"--}}
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/GuzelSanatlarBasvuru/images/'.$guzelSanatlarBasvuru->profil_resmi)}}" class=" w-100 img-fluid " alt="{{$guzelSanatlarBasvuru->name}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$guzelSanatlarBasvuru->name}}&nbsp;Başvurusu</h5>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>TC:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->tc}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Isim:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->isim}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Soy Isim:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->soy_isim}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Cinsiyet:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->cinsiyet}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Dogum Tarihi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->dogum_tarihi}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Dogum Yeri:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->dogum_yeri}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Uyruk:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->uyruk}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Telefon numarası:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="tel:{{$guzelSanatlarBasvuru->telefon}}">{{$guzelSanatlarBasvuru->telefon}}</a></p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Email:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="mailto:{{$guzelSanatlarBasvuru->email}}"{{$guzelSanatlarBasvuru->email}}>{{$guzelSanatlarBasvuru->email}}</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Adres:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->adres}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Okul Adi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->okul_adı}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Bolum Adi:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->bolum_adı}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Egitim Durumu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->egitim_durumu}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Engel Durumu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->engel_durumu?'evet':'hayır'}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Ayni Alan:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->aynı_alan?'evet':'hayır'}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Basvuru Tercih1:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->basvuru_tercih_1}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Basvuru Tercih2:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->basvuru_tercih_2}}</p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Basvuru Tercih3:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->basvuru_tercih_3}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Profil Resmi:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/GuzelSanatlarBasvuru/images/'.$guzelSanatlarBasvuru->profil_resmi)}}">Göster</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Osym Dosyasi:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/GuzelSanatlarBasvuru/osym/'.$guzelSanatlarBasvuru->osym_dosyasi)}}">Göster</a></p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Engel Durum Raporu:&nbsp;</b></p>
                        <p class="card-text col-md-6"><a href="{{asset('storage/GuzelSanatlarBasvuru/engelDurumRaporu/'.$guzelSanatlarBasvuru->engel_durum_raporu)}}">Göster</a></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6"><b>Durum:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->durum}}</p>
                    </div>
                    <div class="row bg-light">
                        <p class="card-text col-md-6"><b>Durum Notu:&nbsp;</b></p>
                        <p class="card-text col-md-6">{{$guzelSanatlarBasvuru->durum_notu}}</p>
                    </div>

                    <p class="card-text"><small class="text-muted">{{$guzelSanatlarBasvuru->created_at?->diffForHumans()}}&nbsp;oluşturulmuş</small></p>
                </div>
            </div>

        </div>
    </div>
@endsection

