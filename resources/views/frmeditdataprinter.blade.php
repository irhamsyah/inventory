@extends('layout.layout')
@section('content')
{{-- Variable 'message from InventoryController@store ' --}}
@include('layout.flashmessage')



    {!!Form::open(['route'=>'updatedataprinter','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Edit Data Printer</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        <input type="text" name="snid" class="form-control" placeholder="Serial Number Printer" aria-label="Username" aria-describedby="basic-addon1" value="{{$hasil->snid}}">
      </div>
      <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Produk Printer</label>
      <?php
          $models = array("L120","L220","L330","LBP6030");
      ?>
      <select class="form-select form-select-md mb-3 w-50" name="model" aria-label=".form-select-lg example">
        <option value="">-- Select Model --</option>
        {{-- below this is method for get old Value if happened error on validation, old value will be back not erased --}}
        @foreach($models as $key=>$value)
          @if ($hasil->model==$value)
              <option value="{{$value}}" selected>{{$value}}</option>
          @else
              <option value="{{$value}}" >{{$value}}</option>
          @endif
        @endforeach
      </select>
      <label for="colFormLabel" class="col-sm-2 col-form-label">Merk Printer</label>

      <?php
          $merkprinters = array("EPSON","CANON","HP","BROTHER");
      ?>
      <select class="form-select form-select-md w-50" name="merk" aria-label=".form-select-sm example">
        <option selected>Open this select menu</option>
        {{-- below this is method for get old Value if happened error on validation, old value will be back not erased --}}
        @foreach ($merkprinters as $key => $value)
            
            @if ($hasil->merk==$value)
                <option value="{{$value}}" selected>{{$value}}</option>
            @else
                <option value="{{$value}}">{{$value}}</option>
            @endif

        @endforeach
      </select>
      
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button class="btn btn-primary" type="submit">BATAL</button>

        </div>
      </div>
    {!!form::close()!!}
@endsection