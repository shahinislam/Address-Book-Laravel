@extends('./layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-uppercase text-info" style="font-family: 'Times New Roman', Times, serif">Address lists</h1>
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

       <div class="m-3 d-flex justify-content-between">
           <h3 class="text-uppercase text-success" style="font-family: cursive;">{{ $contact->firstname }} {{ $contact->lastname }}</h3>
           <a class="btn btn-success font-weight-bold" href="/contacts/{{ $contact->id }}/address/create">Add New Address</a>
       </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Address</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip/PO</th>
                <th>Country</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @forelse($address as $address)
                <tr>
                    <th>{{ $address->name }}</th>
                    <td>{{ $address->street }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->zip }}</td>
                    <td>{{ $address->country }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-warning btn-sm px-3 mr-1" href="/contacts/{{ $contact->id }}/address/{{ $address->id }}/edit">Edit</a>
                            <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No address to show.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div class="card-footer">
            <a class="btn btn-dark mb-2" href="/">Back to Contact List</a>
        </div>
    </div>
@endsection