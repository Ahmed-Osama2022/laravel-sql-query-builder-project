@extends('layouts.master')

@section('title')
  Users index page
@endsection


@section('content')
  <div class="container mt-3">
    <h1>Users Table</h1>

    {{-- Buttons for delete All && create dummy from beginning  --}}
    <div class="d-flex  align-items-center flex-row">
      <form method="POST" action="{{ route('users.create.dummy') }}">
        @csrf
        <button type="submit" class="my-3 btn btn-success">
          Create DUMMY users
        </button>
      </form>

      <form method="POST" action="{{ route('users.deleteall') }}">
        @csrf
        <button type="submit" class="my-3 ms-4 btn btn-danger">
          Delete All
        </button>
      </form>
    </div>
    {{-- End Buttons --}}

  </div>

  <div class="row">
    <div class="table-responsive">
      <table class="table table-hover shadow">
        <thead class="table-active">
          <tr>
            <th scope="col">#</th>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <tbody>
          {{-- Loop using $users in the DB --}}
          {{-- NOTE: Test to make sure the variable is passed to the view with correctly! --}}
          {{-- {{ dd($users) }}  --}}
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              {{-- <th scope="row"></th> --}}
              <th>{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
              <th scope="col">
                {{-- Show the user by it's ID --}}
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Edit</a>
              </th>
              <th>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('delete')

                  <button type="submit"class="btn btn-danger">Delete</button>
                </form>
              </th>
            </tr>
          @endforeach

          {{-- <tr>
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
          </tr> --}}
        </tbody>
      </table>
    </div>

  </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/main.js') }}"></script>
@endsection
