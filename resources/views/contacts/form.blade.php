<div class="form-row">
    <div class="form-group col">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="{{ old('firstname') ?? $contact->firstname }}"
               class="form-control shadow-none {{ $errors->first('firstname') ? ' border-danger' : '' }}" autocomplete="off">
        @error('firstname')
            <div class="text-danger text-capitalize">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="{{ old('lastname') ?? $contact->lastname }}"
               class="form-control shadow-none {{ $errors->first('lastname') ? ' border-danger' : '' }}" autocomplete="off">
        @error('lastname')
            <div class="text-danger text-capitalize">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $contact->email }}"
           class="form-control shadow-none {{ $errors->first('email') ? ' border-danger' : '' }}" autocomplete="off">
    @error('email')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="birth">Date of Birth</label>
    <input type="date" name="birth" value="{{ old('birth') ?? $contact->birth }}"
           class="form-control shadow-none {{ $errors->first('birth') ? ' border-danger' : '' }}" autocomplete="off">
    @error('birth')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>