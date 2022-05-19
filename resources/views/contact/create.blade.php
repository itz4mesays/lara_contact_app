@extends('layouts.main')

@section('title', 'Lara Contact App | Create Contact')

@section('content')

<div class="card">
    <div class="card-header card-title">
      <div class="d-flex align-items-center">
        <h2 class="mb-0">Add New</h2>
        <div class="ml-auto">
        </div>
      </div>
    </div>
  <div class="card-body">
  
    @include('layouts.partials._alert')

    <form action="{{ route('contacts.store') }}" method="POST" id="new_contact">
        @method('POST')
        @csrf()
        @include('contact.partials._form')
    </form>
  </div>
</div>
@endsection