@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="pb-4">{{ $contact->firstname }} {{ $contact->lastname }}'s {{ $phone->name }} phone</h1>
            <div class="d-flex justify-content-start mb-4">
                <a class="btn btn-info mr-2"
                   href="/contacts/{{ $contact->id }}/phones/create">Add New</a>

                <a class="btn btn-warning px-4 mr-2"
                   href="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}/edit">Edit</a>

                <form action="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ $phone->name }}</strong> {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th class="col-4">Name</th>
                    <td>{{ $phone->name }}</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>{{ $phone->number }}</td>
                </tr>
            </table>
            <a class="btn btn-info mt-3" href="/contacts/{{ $contact->id }}/phones">Back to phone</a>

        </div>
    </div>
@endsection