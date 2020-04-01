@extends('layouts.app')

@section('title', 'Address Show')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-uppercase text-info" style="font-family: 'Times New Roman';">
                    <h1>Address</h1>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>{{ $address->name }}</strong> {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h3 class="text-uppercase text-success" style="font-family: cursive;" >
                            {{ $contact->firstname }} {{ $contact->lastname }}
                        </h3>

                        <div class="d-inline-flex mb-4">
                            <a class="btn btn-info btn-sm mr-2"
                               href="/contacts/{{ $contact->id }}/address/create">Add New</a>
                            <a class="btn btn-warning btn-sm px-3 mr-2"
                               href="/contacts/{{ $contact->id }}/address/{{ $address->id }}/edit">Edit</a>
                            <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="col-4">Name</th>
                            <td>{{ $address->name }}</td>
                        </tr>
                        <tr>
                            <th>Street</th>
                            <td>{{ $address->street }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $address->city }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $address->state }}</td>
                        </tr>
                        <tr>
                            <th>Zip</th>
                            <td>{{ $address->zip }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $address->country }}</td>
                        </tr>
                    </table>
                    <a class="btn btn-info mt-3" href="/contacts/{{ $contact->id }}/address">Back to Address</a>
                </div>
            </div>
        </div>
    </div>
@endsection