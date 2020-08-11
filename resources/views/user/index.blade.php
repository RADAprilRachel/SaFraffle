@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">Users</div>
          <div class="card-body bg-secondary">
            <div class="table-responsive">
              <table class="table table-hover table-sm table-dark">
                <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr onclick="window.location='{{ route('users.edit', ['user' => $user['id']])  }}';">
                      <th scope="row">{{ $user['id'] }}</th>
                      <td>{{ $user['name']  }}</td>
                      <td>{{ $user['email'] }}</td>
                      <td>{{ $user['role']  }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
