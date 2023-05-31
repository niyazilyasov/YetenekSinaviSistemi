@extends('admin.layout.layout')
@section('head')
    <style>
        form .col-md-4  {
        max-width: 100%;
        flex-grow: 1;
        }
        .form-switch  {
            padding-left: 12px;
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
    {{ Form::open(array('url' => 'admin/user/edit','method' => 'put',"files"=>true)) }}
    @csrf
    <div class="row">
    <div class="form-group col-md-4">
    {!! Form::hidden('id',$user->id) !!}
    {!! \Form::label('ad','Ad') !!}
    {!! Form::text('ad', $user->ad, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('soyad','Soyad') !!}
    {!! Form::text('soyad', $user->soyad, ['class' => 'form-control ']) !!}
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
    {!! \Form::label('name','Kullanıcı Adı') !!}
    {!! Form::text('name', $user->name, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('password','Şifre') !!}
    {!! Form::password('password', ['class' => 'form-control ','placeholder'=>'Yeni Şifre']) !!}
    </div>
    <div class="form-check form-switch col-md-4 ">
        <br>
    {!! Form::hidden('is_super_admin',0) !!}
    {!! \Form::label('is_super_admin','Yönetici mi',['class'=>'form-check-label']) !!}
    {!! Form::checkbox('is_super_admin',1, $user->is_super_admin, ['class' => 'form-check-input ','role'=>'switch']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('tc_numarasi','TC') !!}
    {!! Form::text('tc_numarasi', $user->tc_numarasi, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('image_url','Mevcut Resim') !!}
    <img src="{{asset('storage/images/'.$user->image_url)}}" class='form-control ' alt="{{$user->name}}" />
    {!! Form::file('file_name',['class' => 'form-control ']) !!}
    </div>
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
        {{ Form::close() }}
@endsection

