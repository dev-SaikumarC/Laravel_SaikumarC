@extends('employees.layout')
@section('content')

<div class="container d-flex flex-column justify-content-center" style="max-width:500px;">
  <div class="card mt-5">
    <div class="card-header">Contactus Page</div>
    <div class="card-body">

      <form action="{{ url('employee/' .$employees->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$employees->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$employees->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$employees->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$employees->mobile}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success" style="width:200px;"></br>
      </form>

    </div>
  </div>
</div>

@stop