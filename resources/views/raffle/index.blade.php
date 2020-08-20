@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">Raffles</div>
          <div class="card-body bg-secondary">
            <div class="table-responsive">
              <table class="table table-hover table-sm table-dark">
                <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Benefactor</th>
                  <th scope="col">Begin Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Description</th>
                  <th scope="col">Ticket Cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($raffles as $raffle)
                    <tr onclick="window.location='{{ route('raffles.raffleItems.index', ['raffle' => $raffle['id']])  }}';">
                      <th scope="row">{{ $raffle['id'] }}</th>
                      <td>{{ $raffle['name']  }}</td>
                      <td>{{ $raffle['benefactor'] }}</td>
                      <td>{{ $raffle['begin_date']->format('m/d/Y') }}</td>
                      <td>{{ $raffle['end_date']->format('m/d/Y')  }}</td>
                      <td>{{ $raffle['description']  }}</td>
                      <td>${{ $raffle['ticket_cost']  }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-sm-10">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-primary" onclick="location.href='{{ route('raffles.create') }}';">+</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
