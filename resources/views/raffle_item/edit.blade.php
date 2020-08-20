@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $raffleItem['name'],  }}</div>
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('raffles.raffleItems.update', [$raffle, $raffleItem]) }}">
            @method('PUT')
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $errors->any()? old('name') : $raffleItem['name'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="donor" class="col-sm-2 col-form-label">Donor</label>
                <div class="col-sm-10">
                  <input name="donor" class="form-control{{ $errors->has('donor') ? ' is-invalid' : '' }}" id="donor" value="{{ $errors->any()? old('donor') : $raffleItem['donor'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('donor') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="value" class="col-sm-2 col-form-label">Value</label>
                <div class="col-sm-10">
                  <input type="number" min="0" step="0.01" name="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : ''     }}" id="value" value="{{ $errors->any()? old('value') : $raffleItem['value'] }}">
                  <small class="invalid-feedback text-light">{{ $errors->first('value') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows=5 class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description">{{ $errors->any()? old('description') : $raffleItem['description'] }}</textarea>
                  <small class="invalid-feedback text-light">{{ $errors->first('description') }}</small>
                </div>
              </div>
              <div class="form-group row text-light">
                <label class="col-sm-2 col-form-label">Item  Img</label>
                @if ($raffleItem['image'])
                <div class="col-sm-4">
                  <img class="img-thumbnail" src="{{ $raffleItem['image'] }}">
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
@endsection
