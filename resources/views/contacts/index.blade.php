@extends('layouts.app')

@section('title', 'Address Book | Contact Page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-uppercase" style="color: darkturquoise; font-family: 'Times New Roman', Times, serif">Contact lists</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif

        <div class="m-3">
            <a class="btn btn-success font-weight-bold" href="/contacts/create">Add New Contact</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Option</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>
                            <a href="/contacts/{{ $contact->id }}/details"
                               class="text-uppercase" style="color: darkslategrey;">
                                {{ $contact->firstname }} {{ $contact->lastname }}</a>
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->birth }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-warning btn-sm px-3 mr-1" href="/contacts/{{ $contact->id }}/edit">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                <div class="modal fade" id="deleteModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center">Delete Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info px-4" data-dismiss="modal">No</button>
                                                <form action="/contacts/{{ $contact->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger px-4">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a href="/contacts/{{ $contact->id }}/address">Address List</a></td>
                        <td><a href="/contacts/{{ $contact->id }}/phones">Phone List</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7">No contacts to show.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    </div>

@endsection

