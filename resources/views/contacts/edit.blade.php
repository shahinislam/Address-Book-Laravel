@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Update contact</h1>

            <form action="/contacts/{{ $contact->id }}" method="post">

                @method('PATCH')

                @include('contacts.form')

                @csrf

                <button class="btn btn-primary mt-3">Update Contact</button>

            </form>
        </div>
    </div>
@endsection