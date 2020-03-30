@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-5">
                <div class="card-header text-center text-uppercase text-light text-info"
                     style="font-family: 'Times New Roman'; background: -webkit-linear-gradient(left, black, darkred);">
                    <h1>Edit Address</h1>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col-md-10">
                        <h3 class="text-uppercase text-success m-2" style="font-family: cursive;" >
                            {{ $contact->firstname }} {{ $contact->lastname }}</h3>

                        <form action="/contacts/{{ $contact->id }}/address/{{ $address->id }}" method="post">

                            @method('PATCH')

                            @include('address.form')

                            @csrf

                            <button class="btn btn-success">Update Address</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection