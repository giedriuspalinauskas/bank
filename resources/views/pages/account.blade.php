@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account info</div>
                <div class="card-body">
                    <h2>Account number:</h2>
                    <p>{{ Auth::user()->id }}</p>
                    <br>
                    <h2>Balance:</h2>
                    <p>{{ Auth::user()->balance }} eu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transfer</div>
                <div class="card-body">
                  <form class="" action="{{ asset('transfers') }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col form-group">
                        <label for="">Account number: </label>
                        <input class="form-control" type="integer" name="nr" value="" placeholder="Account number">
                      </div>
                    </div>
                      <div class="row">
                        <div class="col form-group">
                          <label for="">Price: </label>
                          <input class="form-control" type="float" name="price" value="" placeholder="price">
                        </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex justify-content-end">
                            @csrf
                            <button class="btn btn-primary btn-right"  type="submit" name="submit">Transfer</button>
                          </div>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
