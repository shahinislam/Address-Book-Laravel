@extends('./layout')

@section('content')
    <h1>{{ $contact->name }}</h1>

    <form action="/contacts/{{ $contact->id }}/address" method="post">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') ?? $address->name }}" class="form-control" autocomplete="off">
            @error('name')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" name="street" value="{{ old('street') ?? $address->street }}" class="form-control" autocomplete="off">
            @error('street')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city') ?? $address->city }}" class="form-control" autocomplete="off">
            @error('city')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state" value="{{ old('state') ?? $address->state }}" class="form-control" autocomplete="off">
            @error('state')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="zip">Zip/Po</label>
            <input type="text" name="zip" value="{{ old('zip') ?? $address->zip }}" class="form-control" autocomplete="off">
            @error('zip')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" value="{{ old('country') ?? $address->country }}" class="form-control" autocomplete="off">
            @error('country')
            <p class="text-red">{{ $message }}</p>
            @enderror
        </div>


        @csrf

        <button class="btn btn-primary">Add New Address</button>

    </form>
@endsection