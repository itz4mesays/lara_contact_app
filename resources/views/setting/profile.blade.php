@extends('layouts.main')

@section('title', 'Lara Contact App | Profile')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
          <div class="col-md-3">
              <div class="card">
                  <div class="card-header">
                      Settings
                  </div>
                  <div class="list-group list-group-flush">
                      <a href="#" class="list-group-item list-group-item-action active">Profile</span></a>
                      <a href="#" class="list-group-item list-group-item-action">Account</span></a>
                      <a href="#" class="list-group-item list-group-item-action">Import & Export</span></a>
                  </div>
              </div>
          </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit Profile</strong>
            </div>           
            <div class="card-body">
                <form action="{{ route('settings.edit') }}" method="POST" id="edit-profile" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('setting.partials._edit')
                
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                      <button type="submit" class="btn btn-success">Update Profile</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection


@section('styles')
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endsection