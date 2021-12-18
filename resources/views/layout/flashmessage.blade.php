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