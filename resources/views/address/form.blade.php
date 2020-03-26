<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $address->name }}"
           class="form-control shadow-none {{ $errors->first('name') ? ' border-danger' : '' }}" autocomplete="off">
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
    <label for="zip">Zip/Po</label>
    <input type="text" name="zip" value="{{ old('zip') ?? $address->zip }}"
           class="form-control shadow-none {{ $errors->first('zip') ? ' border-danger' : '' }}" autocomplete="off">
    @error('zip')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" value="{{ old('country') ?? $address->country }}"
           class="form-control shadow-none {{ $errors->first('country') ? ' border-danger' : '' }}" autocomplete="off">
    @error('country')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>