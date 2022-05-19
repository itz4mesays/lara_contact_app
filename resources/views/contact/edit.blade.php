@extends('layouts.main')

@section('title', 'Lara Contact App | Edit Contact')

@section('content')

<div class="card">
    <div class="card-header card-title">
      <div class="d-flex align-items-center">
        <h2 class="mb-0">Edit Contact: #{{ $contact->fullName() }}</h2>
        <div class="ml-auto">
          <a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
      </div>
    </div>
  <div class="card-body">
  
    @include('layouts.partials._alert')

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" id="new_contact">
        @method('PUT')
        @csrf()
        @include('contact.partials._form')
    </form>
  
  </div>
  </div>


    
@endsection