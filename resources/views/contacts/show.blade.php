@extends('layouts.app')

@section('title', 'Contact Show')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-uppercase text-info" style="font-family: 'Times New Roman';">
                    <h1>{{ $contact->firstname }} {{ $contact->lastname }}</h1>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-start m-4">
                        <a class="btn btn-info btn-sm mr-2" href="/contacts/create">Add New</a>
                        <a class="btn btn-warning btn-sm px-4 mr-2"
                           href="/contacts/{{ $contact->id }}/edit">Edit</a>
                        <form action="/contacts/{{ $contact->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="col-3">Name</th>
                            <td>{{ $contact->firstname }} {{ $contact->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $contact->birth }}</td>
                        </tr>
                    </table>

                    <a class="btn btn-info mt-3" href="/contacts">Back to Contacts</a>

                </div>
                </div>
        </div>
    </div>
@endsection