@extends('employees.layout')
@section('content')

<div class="container d-flex flex-column justify-content-center" style="max-width:500px;">
  <div class="card mt-5">
    <div class="card-header">
      <h4><b>Edit Profile</b></h4>
    </div>
    <div class="card-body">

      <form action="{{ url('employee/' .$employees->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$employees->id}}" id="id" required/>
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$employees->name}}" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$employees->address}}" class="form-control" required></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$employees->mobile}}" class="form-control" required></br>
        <label for="profile_image">Profile Picture</label></br>
        <img src="/uploads/{{ $employees->profile_image }}" class="mt-4 mb-4" style="height:100px;">
        <input type="file" class="form-control" name="profile_image" id="profile_image" required></br>
        <h6 class="text-danger">
          <?php echo session('error_message') ?>
        </h6><br>
        <input type="submit" value="Update" class="btn btn-success" style="width:200px;"></br>
      </form>

    </div>
  </div>
</div>

@stop