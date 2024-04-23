@extends('layouts.app')
  
@section('title', 'client')
  
@section('contents')
<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add client</h1>
        <a href="{{ route('clients') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('clients.storec') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <h4>Bussines Name</h4>
                <input type="text" name="b_name" class="form-control" placeholder="Bussines Name">
            </div>
            <div class="col">
                <h4>Address</h4>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
        </div>
        <br>
        <br>
        <h1>Contact Details:</h1>
        <br>
        <br>
        <div class="row mb-3">
            <div class="col">
                <h4>Contact Person</h4>
                <input type="text" name="contact_p" class="form-control" placeholder="Contact Person">
            </div>
            <div class="col">
                <h4>Email</h4>
                <input type="text" class="form-control" name="email_p" placeholder="Email">
            </div>
            <div class="col">
                <h4>Phone Number</h4>
                <input type="text" class="form-control" name="p_number" placeholder="Phone Number">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection



