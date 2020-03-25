@extends('./layout')

@section('content')
    <h1>Update contact</h1>

    <form action="/contacts/{{ $contact->id }}" method="post">
        
        @method('PATCH')
        
        <div class="form-group">
            <label for="firstname">lastname</label>
            <input type="text" name="firstname" value="{{ old('firstname') ?? $contact->firstname }}" class="form-control" autocomplete="off">
            @error('firstname')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" name="lastname" value="{{ old('lastname') ?? $contact->lastname }}" class="form-control" autocomplete="off">
            @error('lastname')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') ?? $contact->email }}" autocomplete="off">
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="birth">Date of Birth</label>
            <input class="form-control" type="date" name="birth" value="{{ old('birth') ?? $contact->birth }}" autocomplete="off">
            @error('birth')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        @csrf

        <button class="btn btn-primary">Update Contact</button>

    </form>
@endsection