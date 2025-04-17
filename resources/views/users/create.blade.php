@extends('layouts.master')

@section('title')
  Create User
@endsection

@section('content')
  <div class="row mt-3">
    <h1 class="mt-3">Create User</h1>
    <div class="col-6">
      <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
          <label for="user_name" class="form-label">Name</label>
          <input name="name" type="text" value="{{ old('name') }}"
                 class="form-control @error('name')
              is-invalid
          @enderror " id="user_name"
                 aria-describedby="nameInput">
          @error('name')
            <div id="nameInput" class="form-text invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>


        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input name="email" type="text" value="{{ old('email') }}"
                 class="form-control @error('email')
              is-invalid @enderror" id="email"
                 aria-describedby="emailInput">
          @error('email')
            <div id="nameInput" class="form-text invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password"
                 class="form-control  @error('password')
              is-invalid @enderror" id="password"
                 aria-describedby="passwordInput">

          @error('password')
            <div id="confirmPassInput" class="form-text invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="confirmPass" class="form-label">Confirm password</label>
          <input name="password_confirmation" type="password"
                 class="form-control @error('password_confirmation')
              is-invalid @enderror" id="confirmPass"
                 aria-describedby="confirmPassInput">
          @error('password_confirmation')
            <div id="confirmPassInput" class="form-text invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input name="created_at" value="{{ old('created_at') }}" type="date"
                 class="form-control  @error('created_at')
              is-invalid
          @enderror  " id="date"
                 aria-describedby="dateInput">
          @error('created_at')
            <div id="confirmPassInput" class="form-text invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div> --}}

        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>

  </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/main.js') }}"></script>
@endsection
