@extends('employees.layout')
@section('content')

<div class="container mt-5 d-flex flex-column justify-content-center" style="max-width:900px;">
  <div class="card">
    <div class="card-header">
      <h4><b>Employees Details</b></h4>
    </div>
    <div class="card-body">


      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <p class="card-title"><b>Name :</b> {{ $employees->name }}</p>
            <p class="card-text"><b>Address :</b> {{ $employees->address }}</p>
            <p class="card-text"><b>Mobile :</b> {{ $employees->mobile }}</p>
          </div>
          <div class="col-6">
            <div class="container d-flex justify-content-center">
              <img src="../uploads/{{ $employees->profile_image }}" style="height:200px;">
            </div>
          </div>
        </div>
      </div>
      </hr>
    </div>
  </div>
</div>