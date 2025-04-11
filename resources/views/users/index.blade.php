@extends('layouts.master')

@section('title')
  Users Index Page
@endsection


@section('content')
  <div class="container mt-3">
    <h1>Users</h1>
  </div>

  <div class="row">
    <table class="table table-hover">
      <thead class="table-active">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>John</td>
          <td>Doe</td>
          <td>@social</td>
        </tr>
      </tbody>
    </table>

  </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/main.js') }}"></script>
@endsection
