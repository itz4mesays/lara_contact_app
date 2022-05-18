<div class="row">
    <div class="col-md-8">
      <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $user->first_name) }}">
          @error('first_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
          
      </div>

      <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}">

          @error('last_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>

      <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" name="email" id="email" class="form-control" disabled value="{{ old('email', $user->email) }}">
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $user->company) }}">

        @error('company')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

      <div class="form-group">
          <label for="bio">Bio</label>
          <textarea name="bio" id="biod" rows="3" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $user->bio) }}</textarea>

          @error('bio')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>
    </div>
    <div class="offset-md-1 col-md-3">
      <div class="form-group">
          <label for="bio">Profile picture</label>
          <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                  <img src="http://via.placeholder.com/150x150"  alt="...">
              </div>
              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width:150px; max-height:150px;"></div>
              <div class="">
                <div class="mt-2">
                    <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*">
                    </span>
                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
              </div>

                @error('profile_picture')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
              
          </div>
      </div>
    </div>
  </div>