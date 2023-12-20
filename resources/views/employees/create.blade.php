@extends('employees.layout')
@section('content')


<div class="container d-flex flex-column justify-content-center" style="max-width:500px;">
  <div class="card mt-5">
    <div class="card-header">
      <div class="row">
        <div class="col-9">
          <b>Create Employee</b>
        </div>
        <div class="col-3 d-flex justify-content-end">
          <b><a class="text-success text-right" href="<?php echo url('employee') ?>">Go Back</a></b>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" required></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" required></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" required></br>
        <label for="profile_image">Profile Picture</label></br>
        <input type="file" class="form-control" name="profile_image" id="profile_image" required></br>
        <h6 class="text-danger">
          <?php echo session('error_message') ?>
        </h6><br>
        <input type="submit" value="Save" class="btn btn-success" style="width:200px;"></br>
    </div>
    </form>

  </div>
</div>

</div>

@stop