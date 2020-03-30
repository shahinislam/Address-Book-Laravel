@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-5">
                <div class="card-header text-center text-uppercase text-light text-info"
                     style="font-family: 'Times New Roman';
                     background: -webkit-linear-gradient(left, green, greenyellow);">
                    <h1>Insert Phone Number</h1>
                </div>
                <div class="card-body">
                    <h3 class="text-uppercase text-success m-2" style="font-family: cursive;" >{{ $contact->firstname }} {{ $contact->lastname }}</h3>

                    <form action="/contacts/{{ $contact->id }}/phones" method="post">

                        @include('phones.form')

                        @csrf

                        <button class="btn btn-success">Add New Phone</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection