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
                    <div class="col-sm-8"><h2>Menu Penjualan</h2></div>
                </div>
            </div>
            {{-- trans --}}
            <div class="site-section">
                <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    {{-- <img src="{{ asset('img/'.$produk->photo) }}" alt="Image" class="img-fluid"> --}}
                    </div>
                    <div class="col-md-6">
                    <h2 class="text-black">{{ $produk->nm_barang }}</h2>
                    {{-- <p>
                        {{ $produk->description }}
                    </p> --}}
            
                    <div class="mb-5">
                      <!-------FORM------->
             <form action="{{ route('keranjang.list',['id'=>$produk->kd_barang]) }}" method="post">
                            @csrf
                            @if(Route::has('login'))
                                @auth
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endauth
                            @endif
                            <p><strong class="text-primary h4">
                                <input hidden type="text" name="nm_barang" value="{{ $produk->nm_barang }}">

                        <label for="reseler"> Harga :</label>
                        Rp <label for="reseler"> {{$produk->hrg_jual}}</label><br>
                            </strong></p>
                        <input type="hidden" name="kd_barang" value="{{ $produk->kd_barang }}">
                        <input type="hidden" name="harga" value="{{ $produk->hrg_jual }}">

                        <small>Sisa Stok {{ $produk->jml_barang }}</small>
                        <input type="hidden" name="stok" value="{{ $produk->jml_barang }}" id="sisastok">
                        <div class="input-group mb-3" style="max-width: 135px;">
                        <div class="input-group-prepend">
                        <button onclick="klikkurang()" id="minus" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input id="input" type="number" name="jumlah" value=1 class="form-control text-center" value=0 aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                        <button onclick="kliktambah()" id="plus" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                         </div>
            
                    </div>
                    <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
                    </form>
                    <!--------------batas form------------>
                    </div>
                </div>
                </div>
            </div>
                        {{-- bts trans--}}

        </div>
    </div>
</div>     
@endsection