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
                    <div class="col-sm-8"><h2>Data Master Barang</h2></div>
                </div>
            </div>
            <table class="display" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Beli Barang</th>
                        <th>Harga Jual Barang</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($databarang as $barang)
                    <tr>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$barang->kd_barang}}</td>
                        <td>{{$barang->nm_barang}}</td>
                        <td>{{$barang->jml_barang}}</td>
                        <td>Rp. {{ number_format($barang->hrg_beli,2,',','.') }}</td>
                        <td>Rp. {{ number_format($barang->hrg_jual,2,',','.') }}</td>

                        <td>
                            {{-- <a class="edit" title="Edit" data-toggle="tooltip" href="{{url('editdatapc/'.$datakomputer->snid)}}"> <i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="{{route('datapc.destroy', ['id' => $datakomputer->snid])}}" onclick="return confirm('Apakah PC akan dihapus')">
                                <i class="material-icons">&#xE872;</i></a> --}}
                                {{Form::model($barang,['method' => 'delete','route' =>['databarang.destroy',$barang->kd_barang],'class'=>'form-inline'])}}

                                <a class="edit" title="Edit" data-toggle="tooltip" href="{{url('editbarang/'.$barang->kd_barang)}}"> <i class="material-icons">&#xE254;</i></a>
                                {{-- <a class="delete" title="Delete" data-toggle="tooltip"  onclick="return confirm('Apakah PC akan dihapus')"> --}}
                                    <i class="material-icons">
                                        {!! Form::submit('&#xE872;', ['class'=>'btn btn-xs btn-ligth btn-sm','onclick'=>'return confirm("Jadi Hapus Data Ini");']) !!}
                                    </i>
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