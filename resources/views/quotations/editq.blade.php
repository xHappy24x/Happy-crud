@extends('layouts.app')
  
@section('title', 'Quotaion Form')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Edit Quotation</h1>
        <a href="{{ route('quotations') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('quotations.updateq', $quotation-> id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <h4>RFQ #</h4>
                <input type="text" name="rfq" value="{{$quotation->rfq}}" class="form-control" placeholder="RFQ #">
            </div>
            <div class="col">
                <h4>Quotation Date</h4>
                <input type="date" name="q_date" value="{{$quotation->q_date}}" class="form-control" placeholder="Quotation Date">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <h4>Supplier Details</h4>
                <input type="text" name="s_detail" value="{{$quotation->s_detail}}" class="form-control" placeholder="Contact Person">
            </div>
            <div class="col">
                <label>clients</label>
                <select name= "client_id" class="form-control">
                    @foreach ($clients as $rs)
                        <option value="{{$rs->id}}" {{$quotation->client_id == $rs->id ? 'selected':''}}>{{$rs->b_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>Products</label>
                <select name= "product_id" class="form-control">
                    @foreach ($products as $rs)
                        <option value="{{$rs->id}}" {{$quotation->product_id == $rs->id ? 'selected':''}}>{{$rs->p_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h4>Service Slip Number</h4>
                <input type="text" name="ss_number" value="{{$quotation->ss_number}}" class="form-control" placeholder="Service Slip Number">
            </div>
            <div class="col">
                <h4>Model</h4>
                <input type="text" name="model" value="{{$quotation->model}}" class="form-control" placeholder="Model">
            </div>
            <div class="col">
                <h4>Serial Number</h4>
                <input type="text" name="s_number" value="{{$quotation->s_number}}" class="form-control" placeholder="Seial Number">
            </div>
        </div>
       
        <div class ="row mb-3">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection