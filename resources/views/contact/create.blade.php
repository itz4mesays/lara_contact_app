@extends('layouts.main')

@section('title', 'Lara Contact App | Create Contact')

@section('content')
    <form action="{{ route('contacts.store') }}" method="POST" id="new_contact">
        @method('POST')
        @csrf()
        @include('contact.partials._form')
    </form>
@endsection