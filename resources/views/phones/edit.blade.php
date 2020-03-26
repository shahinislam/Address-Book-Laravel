@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Phone Number: {{ $contact->firstname }} {{ $contact->lastname }}</h1>

            <form action="/contacts/{{ $contact->id }}/phones/{{ $phone->id }}" method="post">

                @method('PATCH')

                @include('phones.form')

                @csrf

                <button class="btn btn-primary">Update Phone</button>

            </form>
        </div>
    </div>
@endsection