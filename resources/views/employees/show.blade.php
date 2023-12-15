@extends('employees.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">employees Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $employees->name }}</h5>
        <p class="card-text">Address : {{ $employees->address }}</p>
        <p class="card-text">Mobile : {{ $employees->mobile }}</p>
  </div>
       
    </hr>
  
  </div>
</div>