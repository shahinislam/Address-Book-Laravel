@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Add New contact</h1>

            <form action="/contacts" method="post">

                @include('contacts.form')

                @csrf

                <button class="btn btn-primary mt-3">Add New contact</button>

            </form>
        </div>
    </div>
@endsection
