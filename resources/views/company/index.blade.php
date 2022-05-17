@extends('layouts.main')

@section('title', 'Lara Contact App | Companies List')

@section('content')
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Website</th>
        <th scope="col">Address</th>
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
            <td width="150">
              <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
              <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
      @endif
    </tbody>
  </table> 

  {{ $companies->links() }}
@endsection