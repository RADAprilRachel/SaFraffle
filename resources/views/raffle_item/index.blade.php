@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $raffle['name'] }}</div>
          <div class="card-body bg-secondary">
            <form method="POST" enctype="multipart/form-data" action="{{ route('raffles.update', ['raffle' => $raffle['id']]) }}">
            @method('PUT')
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control" id="name" value="{{ $raffle['name'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="benefactor" class="col-sm-2 col-form-label">Benefactor</label>
                <div class="col-sm-10">
                  <input name="benefactor" class="form-control" id="benefactor" value="{{ $raffle['benefactor'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows=5 class="form-control" id="description">{{ $raffle['description'] }}</textarea>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="begin_date" class="col-sm-2 col-form-label">Begin Date</label>
                <div class="col-sm-10">
                  <input type="date" name="begin_date" class="form-control" id="begin_date" value="{{ $raffle['begin_date']->format('Y-m-d') }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                  <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $raffle['end_date']->format('Y-m-d') }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="ticket_cost" class="col-sm-2 col-form-label">Ticket Cost</label>
                <div class="col-sm-10 input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="number" min="0" max="255" step="0.05" name="ticket_cost" class="form-control" id="ticket_cost" value="{{ $raffle['ticket_cost'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label class="col-sm-2 col-form-label">Header Img</label>
                @if ($raffle['image'])
                <div class="col-sm-4">
                  <img class="img-thumbnail" src="{{ $raffle['image'] }}">
                </div>
                <div class="col-sm-6">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="custom-file">
                    <label class="custom-file-label" for="custom-file">Choose New Image</label>
                  </div>
                </div>
                @else
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="custom-file">
                    <label class="custom-file-label" for="custom-file">Choose Image</label>
                  </div>
                </div>
                @endif
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                </div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header bg-dark text-light">Raffle Items</div>
          <div class="card-body bg-secondary">
            <div class="table-responsive">
              <table class="table table-hover table-sm table-dark">
                <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Donor</th>
                  <th scope="col">Value</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($raffleItems as $raffleItem)
                    <tr onclick="window.location='{{ route('raffles.raffleItems.edit', ['raffle' => $raffle['id'],'raffleItem' => $raffleItem['id']])  }}';">
                      <th scope="row">{{ $raffleItem['id'] }}</th>
                      <td>{{ $raffleItem['name']  }}</td>
                      <td>{{ $raffleItem['donor'] }}</td>
                      <td>{{ $raffleItem['value'] }}</td>
                      <td>{{ $raffleItem['description']  }}</td>
                      <td>
                      @if ($raffleItem['image'])
                      <img class="img-thumbnail" src="{{ $raffleItem['image'] }}">
                      @else
                      None
                      @endif
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-sm-10">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-primary" onclick="location.href='{{ route('raffles.raffleItems.create', $raffle) }}';">+</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
