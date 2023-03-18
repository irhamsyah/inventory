@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'viewreportpembelian','method'=>'get','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Cetak Laporan Pembelian</label></h2>


        {{-- Tanggal beli barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Tanggal Awal : </span>
        <input type="text" name="tgl_awal" id="datepicker" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
            {{-- batas Tanggal beli barang --}}
                    {{-- Tanggal2 beli barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Tanggal Akhir : </span>
        <input type="text" name="tgl_akhir" id="datepicker2" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
            {{-- batas Tanggal beli barang --}}


      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">CARI</button>
          <a href="{{url()->previous()}}" class="btn btn-default">BATAL</a>
        </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection