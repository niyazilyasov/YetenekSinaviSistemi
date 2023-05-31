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
    {{ Form::open(array('url' => 'admin/duyuru/create','method' => 'post',"files"=>true)) }}
    @csrf
    <div class="row">
    <div class="form-group col-md-4">
    {!! \Form::label('baslik','Baslik') !!}
    {!! Form::text('baslik', null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-md-12">
    {!! \Form::label('icerik','Icerik') !!}
    {!! Form::textarea('icerik', null, ['class' => 'form-control ',  'rows' =>10]) !!}
    </div>
   
    </div>
    <br>
    {{Form::submit('Kaydet',['class'=>'btn btn-success'])}}
        {{ Form::close() }}
@endsection

