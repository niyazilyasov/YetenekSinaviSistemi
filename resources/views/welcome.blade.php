@extends('appLayout')

@section("contents")

@foreach ($duyurus as $item)
<main>
<div class="icerik" >
            
        
            <h4 >{{$item->baslik}}</h4>
            <p class="icerikText">
                {{Str::substr($item->icerik, 255)}}
            </p>
        

        
            <a href="{{url('duyuruSayfasi')}}/{{$item->id}} " class="btn" ><span>Devamı</span></a>
        
    </div>
    
</main>
@endforeach
@endsection
