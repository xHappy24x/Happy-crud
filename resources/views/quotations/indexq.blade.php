@extends('layouts.app')
  
@section('title', 'Dashboard')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Quotations</h1>
        <a href="{{ route('quotations.createq') }}" class="btn btn-primary">Add New Quotation</a>

        <div class="col-lrg-3">
            <div class="form-group">
                <form type="get" action ="{{route ('quotations.searchq')}}">
                        <div class ="input-group">
                            <input class="form-control" name="query" placeholder="search....">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>


                </form>
            </div>
        </div>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>RFQ #</th>
                <th>Quotations Date</th>
                <th>Supplier Details</th>
                <th>Servie Slip Number</th>
                <th>Model</th>
                <th>Serial Number</th>
                <th>Business Name</th>
                <th>Product Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($quotations->count() > 0)
                @foreach($quotations as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->rfq }}</td>
                        <td class="align-middle">{{ $rs->q_date }}</td>
                        <td class="align-middle">{{ $rs->s_detail }}</td>
                        <td class="align-middle">{{ $rs->ss_number }}</td>
                        <td class="align-middle">{{ $rs->model }}</td>
                        <td class="align-middle">{{ $rs->s_number }}</td>
                        <td class="align-middle">{{ $rs->clients->b_name}}</td>
                        <td class="align-middle">{{ $rs->products->p_name}}</td>

                        
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('quotations.showq', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('quotations.editq', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('quotations.destroyq', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Client not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection