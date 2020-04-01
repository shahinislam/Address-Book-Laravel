@extends('layouts.app')

@section('title', 'Contact Edit')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-5">

                <div class="card-header text-center text-uppercase text-light text-info"
                     style="font-family: 'Times New Roman'; background: -webkit-linear-gradient(left, greenyellow, deepskyblue);">
                    <h1>Update Contact</h1>
                </div>

                <div class="card-body">
                    <form action="/contacts/{{ $contact->id }}" method="post">

                        @method('PATCH')

                        @include('contacts.form')

                        @csrf

                        <button class="btn btn-primary mt-3">Update Contact</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection