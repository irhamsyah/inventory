@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'createinputsatuan','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Satuan Barang</label></h2>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kode Satuan : </span>
        <input type="text" disabled name="kd_satuan_show" class="form-control" placeholder=<?php $t=time(); echo('S'.$t);  ?> aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
      <input type="hidden"  name="kd_satuan" value=<?php $t=time(); echo('S'.$t); ?>>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Deskripsi Satuan Barang : </span>
        <input type="text" name="nm_satuan" class="form-control" placeholder="Contoh : pcs" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{old('nm_satuan')}}" oninput="this.value = this.value.toUpperCase()">
      </div>

      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <a href="{{url()->previous()}}" class="btn btn-danger">BATAL</a>
        </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection