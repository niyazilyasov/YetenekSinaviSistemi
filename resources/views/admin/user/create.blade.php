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
    {{ Form::open(array('url' => 'admin/user/create','method' => 'post',"files"=>true)) }}
    @csrf
    <div class="row">
    <div class="form-group col-md-4">
    {!! \Form::label('ad','Ad') !!}
    {!! Form::text('ad', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('soyad','Soyad') !!}
    {!! Form::text('soyad', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('telefon','Telefon numarası') !!}
    {!! Form::tel('telefon', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('email','E-posta') !!}
    {!! Form::email('email', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('name','Kullanıcı Adı') !!}
    {!! Form::text('name', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('password','Şifre') !!}
    {!! Form::password('password', ['class' => 'form-control ','placeholder'=>'Boş Bırakmayınız']) !!}
    </div>
        <div class="form-check form-switch col-md-4 ">
            <br>
        {!! Form::hidden('is_super_admin',0) !!}
        {!! \Form::label('is_super_admin','Yönetici mi',['class'=>'form-check-label']) !!}
    {!! Form::checkbox('is_super_admin',1, false,['class' => 'form-check-input ','role'=>'switch']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('tc_numarasi','TC') !!}
    {!! Form::text('tc_numarasi', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('image_url','Resim') !!}
    {!! Form::file('file_name',['class' => 'form-control ']) !!}
    </div>
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
        {{ Form::close() }}
@endsection

