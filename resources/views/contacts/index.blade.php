@extends('./layout')

@section('content')
    <div class="">
        <h1>Contact lists</h1>
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

        <a class="btn btn-info d-flex justify-content-center mb-2" href="/contacts/create">Add New Contact</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Birth</th>
                <th>Option</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->firstname }} {{ $contact->lastname }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->birth }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-warning btn-sm px-3" href="/contacts/{{ $contact->id }}/edit">Edit</a>
                        <form action="/contacts/{{ $contact->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td><a class="" href="/contacts/{{ $contact->id }}/address">Address List</a></td>
                    <td><a href="">Phone List</a></td>
                </tr>
            @empty
                <tr><td colspan="4">No contacts to show.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection