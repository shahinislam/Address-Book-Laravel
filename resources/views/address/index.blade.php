@extends('./layout')

@section('content')
    <div class="">
        <h1>{{ $contact->firstname }} {{ $contact->lastname }}'s Address lists:</h1>

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

       <div class="d-flex justify-content-center mb-4">
           <a class="btn btn-outline-info font-weight-bolder"
              href="/contacts/{{ $contact->id }}/address/create">Add New Address</a>
       </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip/PO</th>
                <th>Country</th>
            </tr>
            </thead>
            <tbody>
            @forelse($address as $address)
                <tr>
                    <td>{{ $address->name }}</td>
                    <td>{{ $address->street }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->zip }}</td>
                    <td>{{ $address->country }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-warning btn-sm px-3" href="/contacts/{{ $contact->id }}/address/{{ $address->id }}/edit">Edit</a>
                        <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No address to show.</td></tr>
            @endforelse
            </tbody>
        </table>
        <a class="btn btn-info mb-2" href="/">
            Back to Contact List</a>
    </div>
@endsection