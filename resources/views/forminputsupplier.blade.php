@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'createinputsupplierbarang','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Supplier Barang</label></h2>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kode Satuan : </span>
        <input type="text" disabled name="kd_satuan_supplier]" class="form-control" placeholder=<?php $t=time(); echo('SUP'.$t);  ?> aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
      <input type="hidden"  name="kd_supplier" value=<?php $t=time(); echo('SUP'.$t); ?>>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Nama Supplier : </span>
        <input type="text" name="nm_supplier" class="form-control" placeholder="Contoh : CV. Maju" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{old('nm_supplier')}}" oninput="this.value = this.value.toUpperCase()">
      </div>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Alamat Supplier : </span>
        <input type="text" name="almt_supplier" class="form-control" placeholder="Contoh : Jl. Jawa no. 3" aria-describedby="basic-addon2" value="{{old('almt_supplier')}}" oninput="this.value = this.value.toUpperCase()">
      </div>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Telp Supplier : </span>
        <input type="text" name="tlp_supplier" class="form-control" aria-describedby="basic-addon2" value="{{old('tlp_supplier')}}" oninput="this.value = this.value.toUpperCase()">
      </div>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">FAX Supplier : </span>
        <input type="text" name="fax_supplier" class="form-control" aria-describedby="basic-addon2" value="{{old('fax_supplier')}}" oninput="this.value = this.value.toUpperCase()">
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