@extends('layouts.app')
  
@section('title', 'Clients')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List of Clients</h1>
        <a href="{{ route('clients.createc') }}" class="btn btn-primary">Add New Client</a>
        <div class="col-lrg-3">
            <div class="form-group">
                <form type="get" action ="{{route ('clients.searchc')}}">
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
                <th>Bussines Name</th>
                <th>Address</th>
                <th>Contac Person</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($clients->count() > 0)
                @foreach($clients as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->b_name }}</td>
                        <td class="align-middle">{{ $rs->address }}</td>
                        <td class="align-middle">{{ $rs->contact_p }}</td>
                        <td class="align-middle">{{ $rs->email_p }}</td>
                        <td class="align-middle">{{ $rs->p_number }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('clients.showc', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('clients.editc', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('clients.destroyc', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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