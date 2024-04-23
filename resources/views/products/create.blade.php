@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label>Product Name</label>
                <input type="text" name="p_name" class="form-control" placeholder="Product Name">
            </div>
            <div class="col">
                <label>Part Number</label>
                <input type="text" name="p_number" class="form-control" placeholder="Part Number">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
        <div class="col">
                    <label>Quantity</label>
                <input type="text" name="qty" class="form-control" placeholder="Quantity">
        </div>
        <div class="col">
                    <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price">
        </div>
           
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection