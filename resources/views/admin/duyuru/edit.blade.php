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
    {{ Form::open(array('url' => 'admin/duyuru/edit','method' => 'put',"files"=>true)) }}
    @csrf
    <div class="row">
    <div class="form-group col-md-4">
    {!! Form::hidden('id',$duyurus->id) !!}
    {!! \Form::label('baslik','Başlık') !!}
    {!! Form::text('baslik', $duyurus->baslik, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-4">
    {!! \Form::label('icerik','İçerik') !!}
    {!! Form::text('icerik', $duyurus->icerik, ['class' => 'form-control ']) !!}
    </div>
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
        {{ Form::close() }}
@endsection

