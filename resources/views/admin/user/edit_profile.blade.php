@extends('admin.layout.layout')
@section('head')
    <style>
        form .col-md-4 {
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
    {{ Form::open(array('url' => 'admin/user/edit_profile','method' => 'put',"files"=>true)) }}
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
            {!! Form::hidden('id',$user->id) !!}
            {!! \Form::label('ad','Ad') !!}
            <div class="form-control bg-light" id="ad">{{$user->ad}}</div>
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('soyad','Soyad') !!}
            <div class="form-control bg-light" id="soyad">{{$user->soyad}}</div>
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('tc_numarasi','TC') !!}
            <div class="form-control bg-light" id="tc_numarasi">{{$user->tc_numarasi}}</div>
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('name','Kullanıcı Adı') !!}
            <div class="form-control bg-light" id="name">{{$user->name}}</div>
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('telefon','Telefon numarası') !!}
            {!! Form::tel('telefon', $user->telefon, ['class' => 'form-control ']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('email','E-posta') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control ']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('password','Şifre') !!}
            {!! Form::password('password', ['class' => 'form-control ','placeholder'=>'yeni şifre']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('password_confirmation','Şifre Tekrarı') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control ','placeholder'=>'yeni şifre tekrarı']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! \Form::label('image_url','Mevcut resim') !!}
            <img src="{{asset('storage/images/'.$user->image_url)}}" class='form-control ' alt="{{$user->name}}"/>
            {!! Form::file('file_name',['class' => 'form-control ']) !!}
        </div>
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection

