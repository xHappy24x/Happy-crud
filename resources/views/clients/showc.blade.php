@extends('layouts.app')
  
@section('title', '')
  
@section('contents')
<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">clients</h1>
        <a href="{{ route('clients') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Bussines Name</label>
            <input type="text" name="b_name" class="form-control" placeholder="Bussines Name" value="{{ $client->b_name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $client->address }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Contact Person</label>
            <input type="text" name="contact_p" class="form-control" placeholder="Contact Person" value="{{ $client->contact_p }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email_p" class="form-control" placeholder="Email" value="{{ $client->email_p }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="p_number" class="form-control" placeholder="Phone Number" value="{{ $client->p_number }}" readonly>
        </div>
        
        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $client->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $client->updated_at }}" readonly>
        </div>
    </div>
@endsection