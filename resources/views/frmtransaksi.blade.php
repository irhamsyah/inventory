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
            <table class="display" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>QTY</th>
                        <th>Harga satuan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listpembelian as $barang)
                    <tr>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$barang->kd_barang}}</td>
                        <td>{{$barang->nm_barang}}</td>
                        <td>{{$barang->jml_barang}}</td>
                        <td>Rp. {{ number_format($barang->hrg_jual,2,',','.') }}</td>

                        <td>
                            
                                
                                <a title="Edit" data-toggle="tooltip" href="{{url('pembelian/'.$barang->kd_barang)}}"> 
                                    <i style="font-size:24px" class="fa">&#xf07a;</i>

                                </a>
                                {{-- <a class="delete" title="Delete" data-toggle="tooltip"  onclick="return confirm('Apakah PC akan dihapus')"> --}}
                                    {{-- <i class="material-icons">
                                        {!! Form::submit('&#xE872;', ['class'=>'btn btn-xs btn-ligth btn-sm','onclick'=>'return confirm("Jadi Hapus Data Ini");']) !!}
                                    </i> --}}
                                {{-- </a> --}}
    
                                {{Form::close()}}
    
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            {{-- {{$databarang->links()}} --}}

        </div>
    </div>
</div>     
@endsection