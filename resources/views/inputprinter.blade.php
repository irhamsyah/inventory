@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

    {{-- Variable 'message from InventoryController@store ' --}}


    {!!Form::open(['route'=>'simpaninputprinter','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Input Data Printer</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        <input type="text" name="snid" class="form-control" placeholder="Serial Number Printer" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Produk Printer</label>
      <select class="form-select form-select-md mb-3 w-50" name="model" aria-label=".form-select-lg example">
        <option selected>Open this select menu</option>
        <option value="EPSON L120">EPSON L120</option>
        <option value="EPSON L220">EPSON L220</option>  
        <option value="EPSON L330">EPSON L330</option>
        <option value="CANON LBP6030">CANON LBP6030</option>

      </select>
      <label for="colFormLabel" class="col-sm-2 col-form-label">Tipe Printer</label>

      <select class="form-select form-select-md w-50" name="type" aria-label=".form-select-sm example">
        <option selected>Open this select menu</option>
        <option value="Inkjet Printers">Inkjet Printers</option>
        <option value="Business Inkjet">Business Inkjet</option>
        <option value="Professional Imaging Printers">Professional Imaging Printers</option>
        <option value="Label Printers">Label Printers</option>
        <option value="Dot Matrix Printers">Dot Matrix Printers</option>
        <option value="Laser Printers">Laser Printers</option>

      </select>
      
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button class="btn btn-primary" type="submit">BATAL</button>

        </div>
      </div>
    {!!form::close()!!}
@endsection