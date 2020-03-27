@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4">{{ $contact->firstname }} {{ $contact->lastname }}</h1>

            <div class="d-flex justify-content-start mb-4">
                <a class="btn btn-info mr-2" href="/contacts/create">Add New</a>
                <a class="btn btn-warning px-4 mr-2"
                   href="/contacts/{{ $contact->id }}/edit">Edit</a>
                <form action="/contacts/{{ $contact->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
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

            <a class="btn btn-info mt-3" href="/">Back to Home</a>
        </div>
    </div>
@endsection