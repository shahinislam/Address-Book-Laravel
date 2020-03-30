@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-uppercase text-info" style="font-family: 'Times New Roman';">
                    <h1>Phone Number</h1>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>{{ $phone->name }}</strong> {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <h3 class="text-uppercase text-success" style="font-family: cursive;" >
                            {{ $contact->firstname }} {{ $contact->lastname }}
                        </h3>

                        <div class="d-inline-flex mb-4">
                            <a class="btn btn-info btn-sm mr-2"
                               href="/contacts/{{ $contact->id }}/phones/create">Add New</a>

                            <a class="btn btn-warning btn-sm px-4 mr-2"
                               href="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}/edit">Edit</a>

                            <form action="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover">
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
        </div>
    </div>
@endsection