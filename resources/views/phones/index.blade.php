@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $contact->firstname }} {{ $contact->lastname }}'s Phone Numbers:</h1>

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
                   href="/contacts/{{ $contact->id }}/phones/create">Add New Phone</a>
            </div>

            <table class="table table-bordered">
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
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-warning btn-sm px-3" href="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}/edit">Edit</a>
                            <form action="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No Phone Number to Show.</td></tr>
                @endforelse
                </tbody>
            </table>
            <a class="btn btn-info mb-2" href="/">
                Back to Contact Lists</a>

        </div>
    </div>
@endsection