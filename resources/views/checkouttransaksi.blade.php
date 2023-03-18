@extends('layout.layout')
@section('content')
@include('layout.flashmessage')

      {{-- Variable 'message from InventoryController@store ' --}}
    <div class="row">
      <button class="btn "><i class="fa fa-home"></i></button>

      {!!Form::open(['route'=>'keranjang.simpan','method'=>'post','files'=>true,'enctype'=>'multipart/form-data']) !!}
      {{ csrf_field() }}

      <h2><label for="basic-url" class="form-label mt-3">Checkout Pembelain</label></h2>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">Nota Penjualan : </span>
        <input type="text" disabled name="nota_show" class="form-control" placeholder=<?php $t=time(); echo('TRS'.$t);  ?> aria-label="Nomor Nota" aria-describedby="basic-addon2" >
      </div>
      <input type="hidden"  name="nota" value=<?php $t=time(); echo('TRS'.$t); ?>>
      <div class="input-group mb-3 mt-3 w-50" id="ifYes">
        <span class="input-group-text">User : </span>
        <input type="text" name="username" class="form-control" placeholder="Contoh : pcs" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{Auth::user()->name}}" oninput="this.value = this.value.toUpperCase()">
      </div>
              {{-- Tanggal beli barang --}}
              <div class="input-group mb-3 mt-3 w-50" id="ifYes">
                <span class="input-group-text">Tanggal Transaksi : </span>
                <input type="text" name="tgl_transaksi" id="datepicker" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" >
              </div>
        
      <div class="table-responsive">
        <span class="input-group-text">Rincian Transaksi </span>

        <div class="table-wrapper">
                    <!-------------MULAI FORM------------------>
                        {{-- CATATAN  --}}
                        {{-- JANAGAN PERNAH ADA 2 FORM YANG BELOM ADA FORM CLOSE NYA kareana akan mengakibatkan LIST TRAANSAKSI KE 1 PASTI TIDAK DAPAT D HAPUS KAERANA LANGSUNG KE ROUTE FORM YANG PERTAMA  --}}
                        {{--  --}}
                        <?php 
                        $totgrand=0;
                        ?>
                        <table class="display" id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Item</th>
                                    <th>Harga Barang</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listpembelian as $barang)
                                <tr>
                                    <input hidden name="id[]" value="{{ $barang->id }}">
                                    <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$barang->kd_barang}}</td>
            
                                    <input hidden type="text" name="kd_barang[]" value="{{$barang->kd_barang}}">
                                    <input hidden type="text" name="nm_barang[]" value="{{$barang->nm_barang}}">
                                    <td>{{$barang->nm_barang}}</td>
                                    <input hidden type="text" name="jumlah[]" value="{{$barang->jumlah}}">
                                    <td>
                                        {{$barang->jumlah}}
                                    </td>
                                    <input type="number" hidden name="harga[]" value="{{$barang->harga}}">
                                    <td>Rp. {{ number_format($barang->harga,2,',','.') }}</td>
                                    <input hidden type="text" name="stok[]" value="{{$barang->stok}}">

                                    {{-- MENGHITUNG SUBTOTAL BRG --}}
                                    <?phP
                                    $grand = $barang['jumlah']*$barang['harga'];
                                    $totgrand=$totgrand+$grand;
                                    ?>
                                    <input hidden type="number" name="sub_total_jual[]" value= <?php echo($grand); ?>>
                                    <td>Rp. {{ number_format($grand,2,',','.') }}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <input hidden type="number" name="totaltransaksi" value=<?php echo($totgrand); ?> >
                        <input hidden id="totbeli" type="number" value="{{$totgrand}}">
                        <div class="col-md-32 text-right">
                        <h1>Rp. {{ number_format($totgrand,2,',','.') }}</h1>
                        </div>
                        <div class="col-md-32 text-right">
                          <h1><label>Uang dibayar</label><br>
                          <input type="text" id="uang" onchange="kembalianuang()"></h1>
                        </div>
                        <div class="col-md-32 text-right">
                          <h1><label>Kembalian</label><br>
                          <input disabled type="text" id="kembalian"></h1>
                        </div>

                    {{-- BATAS TABLE --}}
        </div>
      </div>
      <div class="grid">
        <div class="g-col-6 g-col-md-4">
          <button class="btn btn-primary" type="submit">SIMPAN</button>
          <button type="button" class="btn btn-outline-danger and-all-other-classes"> 
            <a href="{{route('canceltransaksi')}}" onclick="if (confirm('Batal Penjualan ?')){return true;}else{event.stopPropagation(); event.preventDefault();};" style="color:inherit"> Batal </a>
          </button>
                  </div>
      </div>
      {!!form::close()!!}
    </div>
  </div>
  
@endsection