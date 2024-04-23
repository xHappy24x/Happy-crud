@extends('layouts.app')
  
@section('title', '')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Quotations</h1>
        <a href="{{ route('quotation.pdf', $quotation->id) }}" class="btn btn-primary">ConvertPDF</a>
        <a href="{{ route('quotations') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">RFQ</label>
            <input type="text" name="rfq" class="form-control" placeholder="RFQ" value="{{ $quotation->rfq }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Quotation Date</label>
            <input type="text" name="q_date" class="form-control" placeholder="Quotation Date" value="{{ $quotation->q_date }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Supplier Details</label>
            <input type="text" name="s_detail" class="form-control" placeholder="Supplier Details" value="{{ $quotation->s_detail }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Bussiness Name</label>
            <input type="text" name="b_name" class="form-control" placeholder="Bussiness Name" value="{{ $quotation->clients->b_name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="p_name" class="form-control" placeholder="Product Name" value="{{ $quotation->products->p_name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Service Slip Number</label>
            <input type="text" name="ss_number" class="form-control" placeholder="Service Slip Number" value="{{ $quotation->ss_number}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Model</label>
            <input type="text" name="model" class="form-control" placeholder="Model" value="{{ $quotation->model}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="s_number" class="form-control" placeholder="Serial Number" value="{{ $quotation->s_number}}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $quotation->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $quotation->updated_at }}" readonly>
        </div>
    </div>
@endsection