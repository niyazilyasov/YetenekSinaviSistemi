@extends('admin.layout.layout')
@section('head')
    <style>
        form .col-md-4  {
        max-width: 100%;
        flex-grow: 1;
        }
    </style>
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::open(array('url' => 'admin/guzelSanatlarBasvuru/edit','method' => 'put',"files"=>true)) }}
    @csrf
    <div class="row">
        {!! Form::hidden('id',$guzelSanatlarBasvuru->id) !!}
        {!! Form::hidden('durum',$guzelSanatlarBasvuru->durum) !!}
        <div class="form-group col-md-8">
        {!! \Form::label('durum_notu',$guzelSanatlarBasvuru->durum==\App\Models\GuzelSanatlarBasvuru::REDDEDILDI?'Ret notu':'Onay notu') !!}
        {!! Form::text('durum_notu', $guzelSanatlarBasvuru->durum_notu, ['class' => 'form-control ']) !!}
    </div>
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
        {{ Form::close() }}
@endsection

