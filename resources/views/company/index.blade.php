@extends('layouts.main')

@section('title', 'Lara Contact App | Companies List')

@section('content')
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Email</th>
        <th scope="col">Company</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if ($companies->count())
          @foreach ($companies as $index => $company)
          <tr>
            <th scope="row">{{ $index + 1}}</th>
            <td>{{ $company->id}}</td>
            <td>Kuhlman</td>
            <td>alfred@test.com</td>
            <td>Company one</td>
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

  <nav class="mt-4">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
@endsection