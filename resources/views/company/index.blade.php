@extends('layouts.main')

@section('title', 'Lara Contact App | Companies List')

@section('content')


<div class="card">
  @include('company.partials._cardHeader', ['pageTitle' => 'All Companies'])
<div class="card-body">

  @include('layouts.partials._filterContacts')

  @include('layouts.partials._alert')
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Website</th>
        <th scope="col">Address</th>
        <th scope="col">Contacts</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if ($companies->count())
          @foreach ($companies as $index => $company)
          <tr>
            <th scope="row">{{ $index + $companies->firstItem() }}</th>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->contacts_count }}</td>
            <td width="150">
              <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
              <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
              <a href="{{ route('companies.destroy', $company->id) }}" 
                class="btn btn-delete btn-sm btn-circle btn-outline-danger" 
                title="Delete" 
                onclick="event.preventDefault();
                document.getElementById('delete-form').submit();">
                <i class="fa fa-times"></i>
              </a>

              <form id="delete-form" action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-none" style="display:none">
                @method('DELETE')
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
      @endif
    </tbody>
  </table> 

  {{ $companies->links() }}

</div>
</div>


@endsection