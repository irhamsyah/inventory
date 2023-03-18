@extends('layout.layout')
@section('content')
@include('layout.flashmessage')
      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {{ Form::open(['route'=>['updatedatakomputer',$hasil],'method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) }}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Update Data Komputer</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        {{ Form::text('snid',$hasil->snid,['required','id'=>'1','class'=>'form-control','placeholder'=>'Serial Number PC']) }}
      </div>
      
      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1">Model</span>
        {{ Form::text('modelpc',$hasil->modelpc,['required','id'=>'2','class'=>'form-control','placeholder'=>'Model PC']) }}
      </div>

      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon3">Type</span>
        {{ Form::text('typepc',$hasil->typepc,['required','id'=>'3','class'=>'form-control','placeholder'=>'Type PC']) }}
      </div>
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
            {{ Form::submit('SIMPAN',['class'=>'btn btn-primary']) }}
            <a href="{{url()->previous()}}" class="btn btn-danger">BATAL</a>
        </div>
      </div>
      {{ form::close() }}
    </div>
  </div>
  
@endsection