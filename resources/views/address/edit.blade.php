@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Address: {{ $contact->firstname }} {{ $contact->lastname }}</h1>

            <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">

                @method('PATCH')

                @include('address.form')


                @csrf

                <button class="btn btn-primary">Update Address</button>

            </form>
        </div>
    </div>
@endsection