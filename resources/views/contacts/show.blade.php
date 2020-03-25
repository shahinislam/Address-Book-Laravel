@extends('./layout')

@section('content')
    <h1>{{ $contact->firstname }} {{ $contact->lastname }}</h1>
    <div class="d-flex justify-content-start mb-2">
        <a class="btn btn-warning btn-sm px-3 mr-2"
           href="/contacts/{{ $contact->id }}/edit">Edit</a>
        <form action="/contacts/{{ $contact->id }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
    @if (session('success'))
        <div class="alert alert-success col-md-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered col-md-8">
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
    <a class="btn btn-info" href="/">Back to Home</a>
@endsection