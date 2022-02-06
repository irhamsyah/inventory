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
                    <div class="col-sm-8"><h2>Data Printer Backup Surabaya </h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial Number Printer</th>
                        <th>Model Printer</th>
                        <th>Type Printer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataprinters as $value)
                    <tr>
                        <td>{{$value->snid}}</td>
                        <td>{{$value->model}}</td>
                        <td>{{$value->merk}}</td>
                        <td>
                            {{-- <a class="edit" title="Edit" data-toggle="tooltip" href="{{url('editdatapc/'.$datakomputer->snidpc)}}"> <i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="{{route('datapc.destroy', ['id' => $datakomputer->snidpc])}}" onclick="return confirm('Apakah PC akan dihapus')">
                                <i class="material-icons">&#xE872;</i></a> --}}
                                {{Form::model($value,['method' => 'delete','route' =>['dataprinter.destroy',$value->snid],'class'=>'form-inline'])}}

                                <a class="edit" title="Edit" data-toggle="tooltip" href="{{url('editdataprinter/'.$value->snid)}}"> <i class="material-icons">&#xE254;</i></a>
                                {{-- <a class="delete" title="Delete" data-toggle="tooltip"  onclick="return confirm('Apakah PC akan dihapus')"> --}}
                                    <i class="material-icons">
                                        {!! Form::submit('&#xE872;', ['class'=>'btn btn-xs btn-ligth btn-sm','onclick'=>'return confirm("Jadi Hapus Data Ini");']) !!}
                                    </i>
                                {{-- </a> --}}
    
                                {{Form::close()}}
    
                        </td>
                    </tr>
                    <tr>
                    @endforeach
                </tbody>
            </table>
            {{$dataprinters->links()}}

        </div>
    </div>
</div>     
@endsection