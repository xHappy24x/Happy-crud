@extends('layouts.app')
  
@section('title', 'Edit Quotation')
  
@section('contents')
    <h1 class="mb-0">Edit Client</h1>
    <hr />
    <form action="{{ route('clients.updatec', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
       <div class="row mb-3">
            <div class="col">
                <br>
                <br>
                <input type="text" name="b_name" class="form-control" placeholder="Bussines Name"value="{{$client->b_name}}">
            </div>
           
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{$client->address}}">
            </div>
           
        </div>

         <div class="row mb-3">
            <div class="col">
                <label>Contact Details:</label>
                <br>
                <br>
                <input type="text" name="contact_p" class="form-control" placeholder="Contact Person" value="{{$client->contact_p}}">
            </div>
           
        </div>

 <div class="row mb-3">
            <div class="col">
                <input type="text" name="email_p" class="form-control" placeholder="Email" value="{{$client->email_p}}">
            </div>
           
        </div>

 <div class="row mb-3">
            <div class="col">
                <input type="text" name="p_number" class="form-control" placeholder="Phone Number" value="{{$client->p_number}}">
            </div>
           
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection