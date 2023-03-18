@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'createbelibarang','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Pembelian Barang</label></h2>
      <h4><label for="basic-url" class="form-label mt-3">Catatan : Sebelum beli barang pastikan sudah input Data Barang</label></h4>

      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">No Faktur Barang : </span>
        <input type="text" name="no_faktur_pembelian" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
      {{-- Nama barang --}}
      {{-- select Kode barang dengan AUTO COMPLTE--}}
      <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Barang :</label>
      <select class="form-select form-select-md mb-3 w-50" id="item" onchange="showname()">
        <option value="">-- Select barang --</option>
        @foreach ($items2 as $item2)
           <option value="{{ $item2->kd_barang}}-{{$item2->kd_satuan}}+{{$item2->nm_barang}}">{{ $item2->nm_barang}}</option>
        @endforeach
     </select>
      {{-- batas Select --}}
    {{-- Kode barang --}}
    <input hidden type="text" name="kd_barang" id="kodebrg">
    {{--  nama barang --}}
    <input hidden type="text" name="nm_barang" id="nmbrg">
    {{-- SATUAN barang --}}
    <input hidden type="text" name="satuan" id="kodesatuan">
        {{-- batas SATUAN barang --}}

      {{-- Jumlah barang --}}
            <div class="input-group mb-3 mt-3 w-50" id="ifYes">
              <span class="input-group-text">Jumlah Barang : </span>
              <input type="number" name="jumlah" id="jml" class="form-control" value="{{old('jml_barang')}}" oninput="this.value = this.value.toUpperCase()">
            </div>
      {{-- batas Jumlah barang --}}
      
      {{-- harga beli barang --}}
        <div class="input-group mb-3 mt-3 w-50" id="ifYes">
            <span class="input-group-text">Harga Beli : </span>
            <input type="number" name="harga" id="harga" class="form-control" value="{{old('harga')}}" oninput="this.value = this.value.toUpperCase()" onchange="kali()">
        <span class="input-group-text">@per satuan </span>
        </div>
        {{-- batas harga beli barang --}}

      {{-- subtotal barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Subtotal : </span>
        <input type="number" name="sub_total_beli" class="form-control" value="{{old('sub_total_beli')}}" oninput="this.value = this.value.toUpperCase()" id="total">
        <span class="input-group-text">@per satuan </span>
      </div>
        {{-- batas subtotal barang --}}
        {{-- Tanggal beli barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Tanggal pembelian : </span>
        <input type="text" name="tgl_beli" id="datepicker" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
      </div>
            {{-- batas Tanggal beli barang --}}

      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <a href="{{url()->previous()}}" class="btn btn-default">BATAL</a>
        </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection