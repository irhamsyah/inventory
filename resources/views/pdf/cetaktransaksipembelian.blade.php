<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <title>LAPORAN TRANSAKSI PEMBELIAN</title>
      </head>
      <body>
    <div class="container">

            <h2 class="text-center">LAPORAN TRANSAKSI PEMBELIAN</h2>
      {!!Form::open(['route'=>'printpembelian','method'=>'get','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

            <div class="row">
            Dari Tanggal : {{date_format(date_create($tgl_awal),"d-m-Y")}}
            <input hidden type="text" name="tgl_awal" value={{date_format(date_create($tgl_awal),"Y-m-d")}}>
        </div>
        <div class="row">
            s/d
        </div>
        <div class="row">
            Hingga Tanggal : {{date_format(date_create($tgl_akhir),"d-m-Y")}}
            <input hidden type="text" name="tgl_akhir" value={{date_format(date_create($tgl_akhir),"Y-m-d")}}>

        </div>
        <div class="row">
                <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nota Pembelian</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Tanggal Pembelian</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cari as $barang)
                          <tr>
                            <th scope="row">{{$barang->no_faktur_pembelian}}</th>
                            <td>{{$barang->kd_barang}}</td>
                            <td>{{$barang->nm_barang}}</td>
                            <td>{{$barang->jumlah}}</td>
                            <td>{{number_format($barang->harga,2,",",".")}}</td>
                            <td>{{number_format($barang->sub_total_beli,2,",",".")}}</td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
        </div>
        <div class="row">
            {{-- <a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a> --}}
            <button type="submit" class="btn btn-primary">PRINT</button>
              {{-- <span class="input-group-text"> --}}
            <a href="{{ route('exporttoexcelpembelian',['tgl_awal'=>date_format(date_create($tgl_awal),"Y-m-d"),'tgl_akhir'=>date_format(date_create($tgl_akhir),"Y-m-d")])}}" class="btn btn-sm btn-danger"> Eksport ke Excel</a>
            <a href="{{ route('home2')}}" class="btn btn-sm btn-danger"> Home</a>
        </div>
        {!!form::close()!!}

    </div>
  </body>
</html>