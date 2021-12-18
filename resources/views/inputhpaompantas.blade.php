@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

    {{-- Variable 'message' on flash from InventoryController@store ' --}}


    {!!Form::open(['route'=>'simpaninputhpaom','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Data HP AOM PANTAS</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">IMEI</span>
        <input type="text" name="imei" class="form-control" placeholder="IMEI1 HP" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        <input type="text" name="snid" class="form-control" placeholder="Serial Number HP" aria-label="SN" aria-describedby="basic-addon1">
      </div>

      <label for="colFormLabel" class="col-sm-2 col-form-label">Merk</label>
      <select class="form-select form-select-md mb-3 w-50" name="merk" aria-label=".form-select-lg example">
        <option selected>select Merk</option>
        <option value="SAMSUNG">SAMSUNG</option>
        <option value="OPPO">OPPO</option>  
        <option value="REALME">REALME</option>

      </select>
      <label for="colFormLabel" class="col-sm-2 col-form-label">MODEL HP</label>

      <select class="form-select form-select-md w-50" name="model" aria-label=".form-select-sm example">
        <option selected>select Model</option>
        <option value="SM-A115F/DS">SM-A115F/DS</option>
        <option value="SM-A127F/DS">SM-A127F/DS</option>
      </select>
      
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button class="btn btn-primary" type="submit">BATAL</button>

        </div>
      </div>
    {!!form::close()!!}
@endsection