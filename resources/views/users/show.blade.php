@extends('layouts.master')

@section('title')
  Users show page
@endsection

@section('content')
  <div class="row mt-3">

    <div class="col-8 col-lg-10  mx-auto mx-0">
      <form method="post" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="user_name" class="form-label">Name</label>
          <input name="name" type="text" value="{{ $user->name ?? 'User Not Found!' }}"
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
          <input name="email" type="text" value="{{ $user->email ?? 'User Not Found!' }}"
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
                 class="form-control @error('email')
              is-invalid @enderror" id="confirmPass"
                 aria-describedby="confirmPassInput">
        </div>

        {{-- <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input value="{{ Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}" name="created_at" type="date"
                 class="form-control" id="date" aria-describedby="dateInput">
          <div id="dateInput" class="form-text"> </div>
        </div> --}}

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>
@endsection


@section('scripts')
  <script src="{{ asset('js/main.js') }}"></script>
@endsection
