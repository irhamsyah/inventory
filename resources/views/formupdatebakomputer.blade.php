@extends('layout.layout')
@include('layout.fortableview')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      {{-- <button class="btn "><i class="fa fa-home"></i></button> --}}

      {!!Form::open(['route'=>'simpanupdatebakomputer','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <input type="hidden" name="id" value="{{$hasil->id}}">
      <input type="hidden" name="snid" value="{{$hasil->snid}}">

      <h2><label for="basic-url" class="form-label mt-3">Update BA Komputer / Laptop</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Nama PIC</span>
        <input type="text" name="nama_pic" class="form-control" placeholder="Nama PIC Mekaar" aria-label="pic" aria-describedby="basic-addon1" value="{{$hasil->nama_pic}}">
      </div>
      
      <div class="input-group mb-3 mt-3 w-50">
      <span class="input-group-text" id="basic-addon1">Tanggal</span>
      <input type="text" id="datepicker" name="tanggal" class="form-control" placeholder="Tanggal BA" aria-label="tanggal" aria-describedby="basic-addon1" value="{{$hasil->tanggal}}">
      </div>

      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Keterangan</span>
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan BA" aria-label="keterangan" aria-describedby="basic-addon1" value="{{$hasil->keterangan}}">
      </div>

      <?php
      $jabatans = array("KRM SBY1","KRM SBY2","KRM SBY 1,2","Kepala Area","Kepala Cabang","Senior Account Officer","Account Officer");
      ?>

      <select class="form-select form-select-md mb-3 w-50" name="jabatan" aria-label=".form-select-lg example">
        <option value="">-- Select Hierarky --</option>
        {{-- below this is method for get old Value if happened error on validation, old value will be back not erased --}}
        @foreach($jabatans as $key=>$value)
          @if (($hasil->jabatan)==$value)
              <option value="{{$value}}" selected>{{$hasil->jabatan}}</option>
          @else
              <option value="{{$value}}" >{{$value}}</option>
          @endif
        @endforeach
      </select>

      {{-- <div class="input-group mb-3 w-50"> --}}
        {{-- <span class="input-group-text" id="basic-addon1">Model</span> --}}
        {{-- Penampilan data Kommputer --}}
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th>Serial Number PC/Laptop</th>
                  <th>Model PC/Laptop</th>
                  <th>Merk PC/Laptop</th>
                  {{-- <th>Actions</th> --}}
              </tr>
          </thead>
          <tbody>
              {{-- @foreach($datakomputers as $datakomputer) --}}
              <tr>
                  <td>{{$hasil->snid}}</td>
                  <td>{{$hasil->modelpc}}</td>
                  <td>{{$hasil->merkpc}}</td>
                  {{-- <td>
                    <input class="form-check-input" type="checkbox" value="{{$hasil->snid}}" id="flexCheckDefault" name="cek_pilih[]">
                    <label class="form-check-label" for="flexCheckDefault">
                       Pilih
                    </label>
                  
                  </td> --}}
              </tr>
              <tr>
              {{-- @endforeach --}}
          </tbody>
      </table>
      {{-- {{$datakomputers->links()}} --}}
      {{-- </div> --}}


      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <a href="{{ url('viewdatabakomputer') }}" class="btn btn-xs btn-primary">BATAL</a>
          {{-- <button class="btn btn-primary" type="submit">BATAL</button> --}}
        </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection