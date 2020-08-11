@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $user['name'] }}</div>
          <div class="card-body bg-secondary">
            <form method="PUT" action="{{ route('users.update', ['user' => $user['id']]) }}">
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" id="name" value="{{ $user['name'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" value="{{ $user['email'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                  <select class="form-control" id="role" value="{{ $user['role'] }}">
                    @foreach ( App\User::$roles as $role )
                        <option @if ($role == $user['role']) selected @endif>{{ $role }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
