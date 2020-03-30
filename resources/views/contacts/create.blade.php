@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-5">
                <div class="card-header text-center text-uppercase text-light text-info"
                     style="font-family: 'Times New Roman'; background: -webkit-linear-gradient(left, greenyellow, deepskyblue);">
                    <h1>Add New Contact</h1>
                </div>

                <div class="card-body">
                    <form action="/contacts" method="post">

                        @include('contacts.form')

                        @csrf

                        <button class="btn btn-info">Add New contact</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
