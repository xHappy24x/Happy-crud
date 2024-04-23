@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>

    <a href="{{ route('products') }}" class="btn btn-primary">Back</a>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="p_name" class="form-control" placeholder="Product Name" value="{{ $product->p_name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Product Number</label>
                <input type="text" name="p_number" class="form-control" placeholder="Part Number" value="{{ $product->p_number }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" name="qty" class="form-control" placeholder="Price" value="{{ $product->qty }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
            
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection