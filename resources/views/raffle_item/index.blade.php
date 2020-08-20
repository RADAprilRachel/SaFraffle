@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $raffle['name'] }}</div>
          <div class="card-body bg-secondary">
	    @if (session()->has('success'))
            <div class="row">
              <div class="col-sm-2">
	      </div>
              <div class="col-sm-10">
	        <div class="alert alert-success">
                  {{ session()->get('success') }}
	        </div>
	      </div>
	    </div>
            @php
            session()->forget('success');
            @endphp
            @endif
            @if ($errors->any())
            <div class="row">
              <div class="col-sm-2">
	      </div>
              <div class="col-sm-10">
                <div class="alert alert-danger">
                  Please correct the errors below
                </div>
	      </div>
	    </div>
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ route('raffles.update', ['raffle' => $raffle['id']]) }}">
            @method('PUT')
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $errors->any()? old('name') : $raffle['name'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="benefactor" class="col-sm-2 col-form-label">Benefactor</label>
                <div class="col-sm-10">
                  <input name="benefactor" class="form-control{{ $errors->has('benefactor') ? ' is-invalid' : '' }}" id="benefactor" value="{{ $errors->any()? old('benefactor') : $raffle['benefactor'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('benefactor') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows=5 class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description">{{ $errors->any()? old('description') : $raffle['description'] }}</textarea>
                  <small class="invalid-feedback text-light">{{ $errors->first('description') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="begin_date" class="col-sm-2 col-form-label">Begin Date</label>
                <div class="col-sm-10">
                  <input type="date" name="begin_date" class="form-control{{ $errors->has('begin_date') ? ' is-invalid' : '' }}" id="begin_date" value="{{ $errors->any()? old('begin_date') : $raffle['begin_date']->format('Y-m-d') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('begin_date') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                  <input type="date" name="end_date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" value="{{ $errors->any() ? old('end_date') : $raffle['end_date']->format('Y-m-d') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('end_date') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="ticket_cost" class="col-sm-2 col-form-label">Ticket Cost</label>
                <div class="col-sm-10 input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="number" min="0" max="255" step="0.01" name="ticket_cost" class="form-control{{ $errors->has('ticket_cost') ? ' is-invalid' : '' }}" id="ticket_cost" value="{{ $errors->any() ? old('ticket_cost') : $raffle['ticket_cost'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('ticket_cost') }}</small>
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
                    <input type="file" name="image" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" id="custom-file">
                    <small class="invalid-feedback text-light">{{ $errors->first('image') }}</small>
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
