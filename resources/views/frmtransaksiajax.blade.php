@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'caribarangajax','method'=>'get','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Form Transaksi</label></h2>
      {{-- <h4><label for="basic-url" class="form-label mt-3">Catatan : Sebelum beli barang pastikan sudah input Data Barang</label></h4> --}}

      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kode Barang : </span>
        <input id="caribarang" type="text" name="kd_barang" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
      {{-- Nama barang --}}
      <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Barang :</label>
      <input disabled type="text" name="nama_barang" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id="idnama">
      {{-- Harga barang --}}
      <label for="colFormLabel" class="col-sm-2 col-form-label">Harga Barang :</label>
      <input disabled type="text" name="harga_barang" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id="idharga" >
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Tanggal pembelian : </span>
        <input type="text" name="tgl_beli" id="datepicker" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
            {{-- batas Tanggal beli barang --}}

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