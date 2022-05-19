@extends('layouts.main')

@section('title', 'Lara Contact App | List')

@section('content')

<div class="card">
  <div class="card-header card-title">
    <div class="d-flex align-items-center">
      <h2 class="mb-0">All Contacts</h2>
      <div class="ml-auto">
        <a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
      </div>
    </div>
  </div>
<div class="card-body">

  @include('layouts.partials._filter')

  @include('layouts.partials._alert')

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Company</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if ($contacts->count())
          @foreach ($contacts as $index => $contact)
          <tr>
            <th scope="row">{{ $index + $contacts->firstItem() }}</th>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->last_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->company ? $contact->company->name : '' }}</td>
            <td width="150">
              <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
              <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
              <a href="{{ route('contacts.destroy', $contact->id) }}" 
                class="btn btn-delete btn-sm btn-circle btn-outline-danger" 
                title="Delete" 
                onclick="event.preventDefault();
                document.getElementById('delete-form').submit();">
                <i class="fa fa-times"></i>
              </a>

              <form id="delete-form" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-none" style="display:none">
                @method('DELETE')
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
      @endif
    </tbody>
  </table>
    {{-- {!! $contacts->links() !!} --}}

    {{ $contacts->appends(request()->only('company_id', 'search'))->links() }}

</div>
</div>


@endsection