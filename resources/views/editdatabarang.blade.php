@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'updatedatabarang','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Update Data Barang</label></h2>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Kode Barang : </span>
        <input type="text" disabled class="form-control"="kodebrg" name="kd_barang_view" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$databrg->kd_barang}}">
      </div>
      <input type="hidden" name="kd_barang" value="{{$databrg->kd_barang}}">
      {{-- Nama barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Nama Barang : </span>
        <input type="text" name="nm_barang" class="form-control" placeholder="Indomie Goreng" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$databrg->nm_barang}}" oninput="this.value = this.value.toUpperCase()">
      </div>
      {{-- batas nama barang --}}
      {{-- Jumlah barang --}}
            <div class="input-group mb-3 mt-3 w-50" id="ifYes">
              <span class="input-group-text">Jumlah Barang : </span>
              <input type="number" name="jml_barang" class="form-control" value="{{$databrg->jml_barang}}" oninput="this.value = this.value.toUpperCase()">
            </div>
      {{-- batas Jumlah barang --}}
      
      {{-- select Satuan --}}
        <label for="colFormLabel" class="col-sm-2 col-form-label">Satuan</label>
        <select class="form-select form-select-md mb-3 w-50" id="position-option" name="kd_satuan">
          <option value="">-- Select satuan --</option>
      {{-- BERIKUT INI ADALAH CARA MENAMPILKAN DATA YANG AKAN DIEDIT PADA  --}}
      {{-- ELEMENT SELECT / LIST --}}

          @foreach ($items as $item)
            @if($databrg->kd_satuan==$item['kd_satuan'])
            <option value="{{$item['kd_satuan']}}" selected>{{$item['nm_satuan']}}</option>

            @else
             <option value="{{ $item['kd_satuan']}}">{{ $item['nm_satuan']}}</option>

             @endif
          @endforeach
       </select>
        {{-- Batas select Satuan --}}

      {{-- select Kategori --}}
      <label for="colFormLabel" class="col-sm-2 col-form-label">Kategori</label>
      <select class="form-select form-select-md mb-3 w-50" name="kd_kategori" id="item">
        <option value="">-- Select kategori --</option>
        @foreach ($items2 as $item2)
        {{-- BERIKUT INI ADALAH CARA MENAMPILKAN DATA YANG AKAN DIEDIT PADA  --}}
        {{-- ELEMENT SELECT / LIST --}}

            @if($databrg->kd_kategori==$item2['kd_kategori'])
            <option value="{{$item2['kd_kategori']}}" selected>{{$item2['nm_kategori']}}</option>

            @else
            <option value="{{ $item2->kd_kategori}}">{{ $item2->nm_kategori}}</option>
            @endif
        @endforeach
     </select>
       {{-- Batas select SaKategorituan --}}
      {{-- Jumlah barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Harga Beli : </span>
        <input type="number" name="hrg_beli" class="form-control" value="{{$databrg->hrg_beli}}" oninput="this.value = this.value.toUpperCase()">
        <span class="input-group-text">@per satuan </span>

      </div>
{{-- batas Jumlah barang --}}
      {{-- Jumlah barang --}}
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Harga Jual : </span>
        <input type="number" name="hrg_jual" class="form-control" value="{{$databrg->hrg_jual}}" oninput="this.value = this.value.toUpperCase()">
        <span class="input-group-text">@per satuan </span>

      </div>
{{-- batas Jumlah barang --}}

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