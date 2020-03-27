<div class="form-group">
    <label for="name">Phone Option</label>
    <select name="name" value class="form-control shadow-none {{ $errors->first('name') ? ' border-danger' : '' }}">
        <option value="" class="text-muted">Select Phone Type</option>
        <option value="Mobile" {{ (old('name') == 'Mobile' || $phone->name == 'Mobile') ? 'selected' : ''}}>Mobile</option>
        <option value="Land" {{ (old('name') == 'Land' || $phone->name == 'Land') ? 'selected' : ''}}>Land</option>
        <option value="Office" {{ (old('name') == 'Office' || $phone->name == 'Office') ? 'selected' : ''}}>Office</option>
        <option value="Day" {{ (old('name') == 'Day' || $phone->name == 'Day') ? 'selected' : ''}}>Day</option>
    </select>
    @error('name')
    <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="number">Phone Number</label>
    <input type="number" name="number" value="{{ old('number') ?? $phone->number }}"
           class="form-control shadow-none {{ $errors->first('number') ? ' border-danger' : '' }}" autocomplete="off" autofocus>
    @error('number')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>