<div class="form-group">
    <label for="name">Phone Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $phone->name }}"
           class="form-control shadow-none {{ $errors->first('name') ? ' border-danger' : '' }}" autocomplete="off">
    @error('name')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="number">Phone Number</label>
    <input type="number" name="number" value="{{ old('number') ?? $phone->number }}"
           class="form-control shadow-none {{ $errors->first('number') ? ' border-danger' : '' }}" autocomplete="off">
    @error('number')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>