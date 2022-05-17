@extends('layouts.main')

@section('title', 'Lara Contact App | Show')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="form-group row">
        <label for="first_name" class="col-md-3 col-form-label">First Name</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->first_name }}</p>
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->last_name }}</p>
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->email }}</p>
        </div>
      </div>

      <div class="form-group row">
        <label for="phone" class="col-md-3 col-form-label">Phone</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->phone }}</p>
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">Address</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->address }}</p>
        </div>
      </div>
      <div class="form-group row">
        <label for="company_id" class="col-md-3 col-form-label">Company</label>
        <div class="col-md-9">
          <p class="form-control-plaintext text-muted">{{ $contact->company->name }}</p>
        </div>
      </div>
      <hr>
      <div class="form-group row mb-0">
        <div class="col-md-9 offset-md-3">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-outline-danger"
              onclick="event.preventDefault();
                document.getElementById('delete-form').submit();">Delete</a>
            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">Cancel</a>

            <form id="delete-form" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-none" style="display:none">
              @method('DELETE')
              @csrf
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection