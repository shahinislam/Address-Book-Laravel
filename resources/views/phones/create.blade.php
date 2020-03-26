@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add New Phone for {{ $contact->firstname }}</h1>

            <form action="/contacts/{{ $contact->id }}/phones" method="post">

                @include('phones.form')

                @csrf

                <button class="btn btn-primary">Add New Phone</button>

            </form>
        </div>
    </div>
@endsection