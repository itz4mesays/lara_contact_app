@extends('layouts.main')

@section('title', 'Lara Contact App | Company View')

@section('content')

<div class="card">
  @include('company.partials._cardHeader', ['pageTitle' => 'View Company'])

<div class="card-body">

@include('layouts.partials._alert')

<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <label for="name" class="col-md-3 col-form-label">Name</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted">{{ $company->name }}</p>
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-md-3 col-form-label">Email</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted">{{ $company->email }}</p>
      </div>
    </div>

    <div class="form-group row">
      <label for="website" class="col-md-3 col-form-label">Website</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted">{{ $company->website }}</p>
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-md-3 col-form-label">Address</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted">{{ $company->address }}</p>
      </div>
    </div>
    <div class="form-group row">
      <label for="company_id" class="col-md-3 col-form-label">Contact Name</label>
      <div class="col-md-9">
        <p class="form-control-plaintext text-muted">{{ $company->user->fullName() }}</p>
      </div>
    </div>
    <hr>
    <div class="form-group row mb-0">
      <div class="col-md-9 offset-md-3">
          <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
          <a href="{{ route('companies.destroy', $company->id) }}" class="btn btn-outline-danger"
            onclick="event.preventDefault();
              document.getElementById('delete-form').submit();">Delete</a>
          <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">Cancel</a>

          <form id="delete-form" action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-none" style="display:none">
            @method('DELETE')
            @csrf
          </form>
      </div>
    </div>
  </div>
</div>

@endsection