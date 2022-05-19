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
            @yield('content')
          </div>
        </div>
      </div>
    </main>

    @include('layouts.partials._scripts')
  </body>
</html>