<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                      <a href="form.html" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">

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