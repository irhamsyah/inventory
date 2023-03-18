@extends('layout.layout')
@include('layout.fortableview')
@section('content') 
@include('layout.flashmessage')
      {{-- Variable 'message from InventoryController@store ' --}}

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>List Transaksi Penjualan</h2></div>
                </div>
            </div>
                    <!-------------MULAI FORM------------------>
        <form method="POST" action="{{ route('keranjang.update') }}"> 
            @csrf
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
                        <th>jumlah barang</th>
                        <th>Harga Barang</th>
                        <th>Total</th>
                        <th>Ubah data</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($listpembelian as $barang)
                    <tr>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$barang->kd_barang}}</td>
                        <input type="hidden" name="id[]" value="{{ $barang->id }}">
                        <input type="hidden" name="stok[]" value="{{ $barang->stok }}">

                        <input hidden name="kd_barang[]" value="{{$barang->kd_barang}}">
                        <td>{{$barang->nm_barang}}</td>
                        <input hidden type="text" name="nm_barang[]" value="{{$barang->nm_barang}}">
                        {{-- <input hidden type="text" name="nm_barang[]" value="{{$barang->nm_barang}}"> --}}
                        {{-- <input type="number" hidden name="jumlah[]" value="{{$barang->jumlah}}"> --}}

                        <td>
                            {{-- <div class="input-group mb-3" style="max-width: 135px;"> --}}
                                <div class="input-group-prepend">
                                {{-- <button onclick="klikkurang()" id="minus" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button> --}}
                                </div>
                                <input id="input" type="number" name="jumlah[]" class="form-control text-center" value={{$barang->jumlah}} aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                {{-- <button onclick="kliktambah()" id="plus" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button> --}}
                                </div>
                            {{-- </div> --}}
                        
                        </td>
                        <td>Rp. {{ number_format($barang->harga,2,',','.') }}</td>
                        <?php

                        $grand = $barang['jumlah']*$barang['harga'];
                        $totgrand=$totgrand+$grand;
                        ?>

                        <td>Rp. {{ number_format($grand,2,',','.') }}</td>
                        <td>
                            {{-- HAPUS BARANG DENGAN ID  --}}
                            <a href="{{ route('keranjang.delete',['id'=>$barang->id])}}" class="btn btn-primary btn-sm" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Link Title">
                                X
                            </a>
                        </td>


                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-32">
            Rp. {{ number_format($totgrand,2,',','.') }}
            </div>
            {{-- {{$databarang->links()}} --}}
            <p><button type="submit" class="buy-now btn btn-lg btn-primary">Update Transaksi</button></p>
            <p>
            <a href="{{ route('penjualanbarang') }}" class="btn btn-primary btn-lg" >Belanja Lagi</a>
            </p>
            <div class="col-md-12 bg-light text-right">
                <a href="{{ route('keranjang.checkout') }}" class="btn btn-danger btn-lg py-3" >Checkout</a>
                <p>
                <small>Jika Merubah Quantity Pada Keranjang Maka Klik Update Keranjang Dulu Sebelum Melakukan Checkout</small>
                </p>
              </div>
        </form>

        </div>
    </div>
</div>     
@endsection