@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $raffleItem['name'],  }}</div>
          <div class="card-body bg-secondary">
            <form method="POST" enctype="multipart/form-data" action="{{ route('raffles.raffleItems.update', [$raffle, $raffleItem]) }}">
            @method('PUT')
            @csrf
              <div class="form-group row text-light">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input name="name" class="form-control" id="name" value="{{ $raffleItem['name'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="donor" class="col-sm-2 col-form-label">Donor</label>
                <div class="col-sm-10">
                  <input name="donor" class="form-control" id="donor" value="{{ $raffleItem['donor'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="value" class="col-sm-2 col-form-label">Value</label>
                <div class="col-sm-10">
                  <input type="number" step="any" name="value" class="form-control" id="value" value="{{ $raffleItem['value'] }}">
                </div>
              </div>
              <div class="form-group row text-light">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows=5 class="form-control" id="description">{{ $raffleItem['description'] }}</textarea>
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
@endsection
