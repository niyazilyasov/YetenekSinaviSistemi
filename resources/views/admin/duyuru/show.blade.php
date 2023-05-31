@extends('admin.layout.layout')
@section('content')
    <div class="card mb-3" >{{--    style="max-width: 540px;"--}}
        <div class="row g-0">
            
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{$duyurus->baslik}}</h5>
                    <p class="card-text"><b>{!!$duyurus->icerik!!}</p>
                
                    <p class="card-text"><small class="text-muted">{{$duyurus->created_at }}'te&nbsp;oluşturulmuş</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection

