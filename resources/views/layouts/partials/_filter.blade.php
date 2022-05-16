<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <form>
        <div class="row">
          <div class="col">
            <select class="custom-select" id="company_id" name="company">
              @if ($companies->count())
                  @foreach ($companies as $key => $company)
                    <option {{ $key == Request::get('company_id') ? 'selected' : ''  }} value="{{$key}}"> {{ $company }}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
              <div class="input-group-append">
                  <button class="btn btn-outline-secondary" id="btn-clear" type="button">
                      <i class="fa fa-refresh"></i>
                    </button>
                <button class="btn btn-outline-secondary" type="search" id="button-addon2">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>