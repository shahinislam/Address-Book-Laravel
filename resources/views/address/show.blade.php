@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="pb-4">{{ $contact->firstname }} {{ $contact->lastname }}'s {{ $address->name }} Address</h1>
            <div class="d-flex justify-content-start mb-4">
                <a class="btn btn-info mr-2"
                   href="/contacts/{{ $contact->id }}/address/create">Add New</a>
                <a class="btn btn-warning px-4 mr-2"
                   href="/contacts/{{ $contact->id }}/address/{{ $address->id }}/edit">Edit</a>
                <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ $address->name }}</strong> {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
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
@endsection