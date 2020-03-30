
<div class="form-group">
    <label for="name">Address Option</label>
    <select autofocus name="name" class="form-control shadow-none {{ $errors->first('name') ? ' border-danger' : '' }}">
        <option value="" class="text-muted">Select Address</option>
        <option value="Home" {{ (old('name') == 'Home' || $address->name == 'Home') ? 'selected' : ''}}>Home</option>
        <option value="Office" {{ (old('name') == 'Office' || $address->name == 'Office') ? 'selected' : ''}}>Office</option>
        <option value="Company" {{ (old('name') == 'Company' || $address->name == 'Company') ? 'selected' : ''}}>Company</option>
    </select>
    @error('name')
    <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="street">Street</label>
    <input type="text" name="street" value="{{ old('street') ?? $address->street }}"
           class="form-control shadow-none {{ $errors->first('street') ? ' border-danger' : '' }}" autocomplete="off">
    @error('street')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" value="{{ old('city') ?? $address->city }}"
           class="form-control shadow-none {{ $errors->first('city') ? ' border-danger' : '' }}" autocomplete="off">
    @error('city')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" value="{{ old('state') ?? $address->state }}"
           class="form-control shadow-none {{ $errors->first('state') ? ' border-danger' : '' }}" autocomplete="off">
    @error('state')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="zip">Zip/Post</label>
    <input type="text" name="zip" value="{{ old('zip') ?? $address->zip }}"
           class="form-control shadow-none {{ $errors->first('zip') ? ' border-danger' : '' }}" autocomplete="off">
    @error('zip')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="country">Country</label>
    <select name="country" class="form-control shadow-none {{ $errors->first('country') ? ' border-danger' : '' }}">
        <option value="" class="text-muted">Select Country</option>

        @foreach($countries as $country)
            <option value="{{ $country->name }}" {{ (old('country') == $country->name || $address->country == $country->name) ? 'selected' : ''}}>{{ $country->name }}</option>
        @endforeach

    </select>

    @error('country')
    <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>