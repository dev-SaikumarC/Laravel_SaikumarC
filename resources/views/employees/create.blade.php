@extends('employees.layout')
@section('content')


<div class="container d-flex flex-column justify-content-center" style="max-width:500px;">
  <div class="card mt-5">
    <div class="card-header"><b>Create Employee</b></div>
    <div class="card-body">

      <form action="{{ url('employee') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success" style="width:200px;"></br>
      </form>

    </div>
  </div>

</div>

@stop