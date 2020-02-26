@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">History</div>
                  <br>
                    <div class="card-body">
                      <h3>Your send transfer</h3>
                      <table class="table table-striped table-warning">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Your acc number</th>
                            <th scope="col">Send to acc number</th>
                            <th scope="col">time</th>
                            <th scope="col">price</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($transfers as $transfer)
                          @if ($transfer->number == Auth::user()->id)

                            <tr>
                              <th scope="row"></th>
                              <td>{{$transfer->number}}</td>
                              <td>{{$transfer->sendTo}}</td>
                              <td>{{$transfer->created_at}}</td>
                              <td> - {{$transfer->price}}</td>
                            </tr>
                          @endif
                        @endforeach
                        </tbody>
                      </table>
                      <h3>You get transfer</h3>
                      <table class="table table-striped table-success">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Your acc number</th>
                            <th scope="col">get form acc number</th>
                            <th scope="col">time</th>
                            <th scope="col">price</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($transfers as $transfer)
                          @if ($transfer->sendTo == Auth::user()->id)
                            <tr>
                              <th scope="row"></th>
                              <td>{{$transfer->sendTo}}</td>
                              <td>{{$transfer->number}}</td>
                              <td>{{$transfer->created_at}}</td>
                              <td>{{$transfer->price}}</td>
                            </tr>
                          @endif
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
