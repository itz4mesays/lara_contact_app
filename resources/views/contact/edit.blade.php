@extends('layouts.main')

@section('title', 'Lara Contact App | Edit Contact')

@section('content')
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" id="new_contact">
        @method('PUT')
        @csrf()
        @include('contact.partials._form')
    </form>
@endsection