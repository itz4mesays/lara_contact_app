@extends('layouts.main')

@section('title', 'Lara Contact App | Edit Company')

@section('content')

<div class="card">
    @include('company.partials._cardHeader', ['pageTitle' => 'Edit Company'])

  <div class="card-body">
  
    @include('layouts.partials._alert')

    <form action="{{ route('companies.update', $company->id) }}" method="POST" id="edit-company">
        @method('PUT')
        @csrf()

        @include('company.partials._form')

    </form>
  
  </div>
  </div>


    
@endsection