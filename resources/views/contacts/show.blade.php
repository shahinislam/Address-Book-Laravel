@extends('./layout')

@section('content')
    <div class="alert alert-success">
        <strong>Success!</strong> New Contact has been inserted.
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Birth</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->birth }}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-info" href="/">Back to Home</a>
@endsection