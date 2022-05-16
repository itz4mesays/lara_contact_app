<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Lara Contact App')</title>

    @include('layouts.partials._links')
  </head>
  <body>
    <!-- navbar -->
    
    @include('layouts.partials._nav')

    <!-- content -->
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Contacts</h2>
                    <div class="ml-auto">
                      <a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">

                {{-- @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif --}}

                @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Good!</strong> {{ Session::get('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>  
                @endif

                @if (Session::has('failed'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Error!</strong> {{ Session::get('failed') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif

                @yield('content')

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    @include('layouts.partials._scripts')
  </body>
</html>