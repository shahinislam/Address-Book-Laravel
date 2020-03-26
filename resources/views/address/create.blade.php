@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add New Address for {{ $contact->firstname }}</h1>

            <form action="/contacts/{{ $contact->id }}/address" method="post">

                @include('address.form')

                @csrf

                <button class="btn btn-primary">Add New Address</button>

            </form>
        </div>
    </div>
@endsection