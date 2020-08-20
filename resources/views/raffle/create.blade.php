@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">New Raffle</div>
          <div class="card-body bg-secondary">
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('raffles.store') }}">
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Raffle Name" value="{{ old('name') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="benefactor" class="col-sm-2 col-form-label">Benefactor</label>
                <div class="col-sm-10">
                  <input name="benefactor" class="form-control{{ $errors->has('benefactor') ? ' is-invalid' : '' }}" id="benefactor" placeholder="Benefactor" value="{{ old('benefactor') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('benefactor') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows=5 class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Description">{{ old('description') }}</textarea>
                  <small class="invalid-feedback text-light">{{ $errors->first('description') }}</small>
                </div>
              </div>
	      <div class="form-group row text-light">
                <label for="begin_date" class="col-sm-2 col-form-label">Begin Date</label>
                <div class="col-sm-10">
                  <input type="date" name="begin_date" class="form-control{{ $errors->has('begin_date') ? ' is-invalid' : '' }}" id="begin_date" value="{{ old('begin_date') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('begin_date') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                  <input type="date" name="end_date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" value="{{ old('end_date') }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('end_date') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="ticket_cost" class="col-sm-2 col-form-label">Ticket Cost</label>
                <div class="col-sm-10 input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="number" min="0" max="255" step="0.05" name="ticket_cost" class="form-control{{ $errors->has('ticket_cost') ? ' is-invalid' : '' }}" id="ticket_cost" value="{{ $errors->any() ? old('ticket_cost') : '5.00' }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('ticket_cost') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label class="col-sm-2 col-form-label">Header Img</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <label class="custom-file-label" for="custom-file">Choose Image</label>
                    <input type="file" name="image" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" id="custom-file">
                    @if ($errors->any())
                      @if ($errors->first('image'))
                        <small class="invalid-feedback text-light">{{ $errors->first('image') }}</small>
                      @else
                        <small class="text-light">You will need to reselect the image file</small>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                </div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
