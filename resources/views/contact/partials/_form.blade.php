<div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label for="first_name" class="col-md-3 col-form-label">First Name</label>
          <div class="col-md-9">
            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $contact->first_name) }}">
            @error('first_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            
          </div>
        </div>
  
        <div class="form-group row">
          <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
          <div class="col-md-9">
            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $contact->last_name) }}">
            @error('last_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
  
        <div class="form-group row">
          <label for="email" class="col-md-3 col-form-label">Email Address</label>
          <div class="col-md-9">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $contact->email) }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
  
        <div class="form-group row">
          <label for="phone" class="col-md-3 col-form-label">Phone</label>
          <div class="col-md-9">
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $contact->phone) }}">
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
  
        <div class="form-group row">
          <label for="name" class="col-md-3 col-form-label">Address</label>
          <div class="col-md-9">
            <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address', $contact->address) }}</textarea>
            @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="company_id" class="col-md-3 col-form-label">Company</label>
          <div class="col-md-9">
            <select name="company_id" id="id_company" class="form-control @error('company_id') is-invalid @enderror">
              @foreach ($companies as $key => $val )
                <option {{ $key == old('company_id', $contact->company_id) ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
              @endforeach
            </select>
            @error('company_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
          <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">{{ $contact->exists ? 'Update' : 'Save' }}</button>
              <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </div>
      </div>
    
    
  </div>