<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">

    <title>Input Data Komputer</title>
  </head>
  <body>
    {{-- Form Input --}}
    
    <div class="container">
      {{-- Variable 'message from InventoryController@store ' --}}
      @if(session()->has('message'))
      <div class="alert alert-success">
          {{session()->get('message')}}
      </div>
      @endif
      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
              {{$error}}
          </div>
        @endforeach
      @endif


    {!!Form::open(['route'=>'simpaninputkomputer','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}

      <h2><label for="basic-url" class="form-label mt-3">Input Data Komputer</label></h2>
      <div class="input-group mb-3 mt-3 w-50">
        <span class="input-group-text" id="basic-addon1">Serial Number</span>
        <input type="text" name="snidpc" class="form-control" placeholder="Serial Number PC" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      
      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1">Model</span>
        <input type="text" name="modelpc" class="form-control" placeholder="Model PC" aria-label="Recipient's username" aria-describedby="basic-addon2">
        {{-- <span class="input-group-text" id="basic-addon2">@example.com</span> --}}
      </div>
      
      {{-- <label for="basic-url" class="form-label">Your vanity URL</label> --}}
      <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon3">Type</span>
        <input type="text" name="typepc" class="form-control" id="basic-url" placeholder="Type PC" aria-describedby="basic-addon3">
      </div>
      {{-- <div class="w-50 p-3 bor" style="background-color: #eee;">
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-lg w-10">SIMPAN</button>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary btn-lg w-10">BATAL</button>

          </div>
        </div>
      </div> --}}
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button class="btn btn-primary" type="submit">BATAL</button>

        </div>
      </div>
      {{-- <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
      </div>
      
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
      </div>
      
      <div class="input-group">
        <span class="input-group-text">With textarea</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
      </div> --}}
    {!!form::close()!!}
    </div>
    {{-- Batas Form Input --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>