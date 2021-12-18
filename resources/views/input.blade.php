@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'simpaninputkomputer','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Data Komputer</label></h2>

      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        <input type="text" name="snidpc" class="form-control" placeholder="Serial Number PC" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      
      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1">Model</span>
        <input type="text" name="modelpc" class="form-control" placeholder="Model PC" aria-label="Recipient's username" aria-describedby="basic-addon2">
      </div>
      
      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon3">Type</span>
        <input type="text" name="typepc" class="form-control" id="basic-url" placeholder="Type PC" aria-describedby="basic-addon3">
      </div>
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button class="btn btn-primary" type="submit">BATAL</button>

        </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection