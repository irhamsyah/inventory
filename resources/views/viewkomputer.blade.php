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
                    <div class="col-sm-8"><h2>Data <b>Komputer <b>dan <b>Laptop</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial Number PC/Laptop</th>
                        <th>Model PC/Laptop</th>
                        <th>Type PC/Laptop</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datakomputers as $datakomputer)
                    <tr>
                        <td>{{$datakomputer->snidpc}}</td>
                        <td>{{$datakomputer->modelpc}}</td>
                        <td>{{$datakomputer->typepc}}</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip" href="{{url('editdatapc/'.$datakomputer->snidpc)}}"> <i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                    @endforeach
                </tbody>
            </table>
            {{$datakomputers->links()}}

        </div>
    </div>
</div>     
@endsection