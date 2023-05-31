@extends('admin.layout.layout')
@section('content')
    <div class="card mb-3" >{{--    style="max-width: 540px;"--}}
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/images/'.$user->image_url)}}" class=" h-100 img-fluid rounded-start" alt="{{$user->name}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$user->ad.' '.$user->soyad}}</h5>
                    <p class="card-text"><b>Kullanıcı adı:&nbsp;</b>{{$user->name}}</p>
                    <p class="card-text"><b>Email:&nbsp;</b><a href="mailto:{{$user->email}}"{{$user->email}}>{{$user->email}}</a></p>
                    <p class="card-text"><b>Ad:&nbsp;</b>{{$user->ad}}</p>
                    <p class="card-text"><b>Soyad:&nbsp;</b>{{$user->soyad}}</p>
                    <p class="card-text"><b>Telefon numarası:&nbsp;</b><a href="tel:{{$user->telefon}}">{{$user->telefon}}</a></p>
                    <p class="card-text"><b>Yönetici mi:&nbsp;</b>{{$user->is_super_admin?'evet':'hayır'}}</p>
                    <p class="card-text"><b>TC Kimlik Numarası:&nbsp;</b>{{$user->tc_numarasi}}</p>
                    <p class="card-text"><small class="text-muted">{{$user->created_at?->diffForHumans()}}&nbsp;oluşturulmuş</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection

