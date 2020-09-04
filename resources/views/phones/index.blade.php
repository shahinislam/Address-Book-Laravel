@extends('layouts.app')

@section('title', 'Addess Book | Phones')

@section('content')
        <div class="card">
            <div class="card-header">
                <h1 class="text-center text-uppercase text-info" style="font-family: 'Times New Roman', Times, serif">Phone Number</h1>
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

            <div class="d-flex justify-content-between m-4">
                <h3 class="text-uppercase text-success" style="font-family: cursive;">{{ $contact->firstname }} {{ $contact->lastname }}</h3>
                <a class="btn btn-success font-weight-bolder"
                   href="/contacts/{{ $contact->id }}/phones/create">Add New Phone</a>
            </div>

            <table class="table table-sm table-striped table-hover">
                <thead>
                <tr>
                    <th>Phone Type</th>
                    <th>Number</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @forelse($phones as $phone)
                    <tr>
                        <td>{{ $phone->name }}</td>
                        <td>{{ $phone->number }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-warning btn-sm px-3 mr-1" href="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}/edit">Edit</a>
                                <form action="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No Phone Number to Show.</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="card-footer">
                <a class="btn btn-dark" href="/contacts">Back to Contact Lists</a>
            </div>
        </div>
@endsection