@extends('./layout')

@section('content')
    <div>
        <h1>Contact lists</h1>

        <a class="btn btn-info" href="/contacts/create">Add New Contact</a>

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
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->firstname }}</td>
                    <td>{{ $contact->lastname }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->birth }}</td>
                    <td>
                        <a class="btn btn-warning" href="/contacts/{{ $contact->id }}/edit">Edit</a>
                        
                        <form action="/contacts/{{ $contact->id }}" method="post">
                            @method('DELETE')
                            @csrf
                    
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td>No contacts to show.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection