@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'createinputkategori','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Kategori Barang</label></h2>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kode Kategori : </span>
        <input type="text" disabled name="id_kategori_show" class="form-control" placeholder=<?php $t=time(); echo($t);  ?> aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
      <input type="hidden"  name="kd_kategori" value=<?php $t=time(); echo($t); ?>>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kategori Barang : </span>
        <input type="text" name="nm_kategori" class="form-control" placeholder="COntoh : Makanan,Minuman" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{old('nm_kategori')}}" oninput="this.value = this.value.toUpperCase()">
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