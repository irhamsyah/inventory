<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <title>REPORT TRANSAKSI HARIAN</title>
      </head>
      <body>
    <div class="container">
        {!!Form::open(['route'=>'printstokpdf','method'=>'get','files'=>true,'enctype'=>'multipart/form-data']) !!}
          {{ csrf_field() }}

            <h2 class="text-center">LAPORAN STOK BARANG</h2>
        </div>
        <div class="row">
                <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cari as $barang)
                          <tr>
                            <th scope="row">{{$barang->kd_barang}}</th>
                            <td>{{$barang->nm_barang}}</td>
                            <td>{{$barang->jml_barang}}</td>
                            <td>{{$barang->nm_satuan}}</td>
                            <td>{{$barang->nm_kategori}}</td>
                            <td>{{number_format($barang->hrg_beli,2,",",".")}}</td>
                            <td>{{number_format($barang->hrg_jual,2,",",".")}}</td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
        </div>
        <div class="row">
            {{-- <a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a> --}}
            <button type="submit" class="btn btn-primary">PRINT</button>
              {{-- <span class="input-group-text"> --}}
            <a href="{{ route('exportstoktoexcel')}}" class="btn btn-sm btn-danger"> Eksport ke Excel</a>
            <a href="{{ route('home2')}}" class="btn btn-sm btn-danger"> Home</a>
        </div>
        {!!form::close()!!}

    </div>
  </body>
</html>