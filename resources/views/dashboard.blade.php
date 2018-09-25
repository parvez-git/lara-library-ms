@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if(auth()->user()->role->slug == 'admin' || auth()->user()->role->slug == 'liberian')

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-primary mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $totalbooks }}</h1>
                                     <p class="card-text uppercase">Total Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $latebooks }}</h1>
                                     <p class="card-text uppercase">Late Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $returnedbooks }}</h1>
                                     <p class="card-text uppercase">Returned Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $lostbooks }}</h1>
                                     <p class="card-text uppercase">Lost Books</p>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-secondary mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $totissuedbooks }}</h1>
                                     <p class="card-text uppercase">Issued Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $totrequestedbooks }}</h1>
                                     <p class="card-text uppercase">Requested Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-dark mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $pendingbooks }}</h1>
                                     <p class="card-text uppercase">Pending Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $rejectedbooks }}</h1>
                                     <p class="card-text uppercase">Rejected Books</p>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="card-header mt-3 border-top border-left border-right width100">
                            Latest Issued Books
                        </div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>SL.</th>
                                <th>Book</th>
                                <th>Member</th>
                                <th>Publisher</th>
                                <th>ISBN</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($issuedbooks as $key => $issuedbook)
                                  <tr>
                                    <th scope="row">{{++$key}}.</th>
                                    <td>{{$issuedbook->book->title}} <em>by {{$issuedbook->book->author->name}}</em></td>
                                    <td>{{$issuedbook->user->name}}</td>
                                    <td>{{$issuedbook->book->publisher->name}}</td>
                                    <td>{{$issuedbook->book->ISBN}}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <div class="card-header mt-3 border-top border-left border-right width100">
                            Latest Requested Books
                        </div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>SL.</th>
                                <th>Book</th>
                                <th>Member</th>
                                <th>Publisher</th>
                                <th>ISBN</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($requestedbooks as $key => $requestedbook)
                                  <tr>
                                    <th scope="row">{{++$key}}.</th>
                                    <td>{{$requestedbook->book->title}} <em>by {{$requestedbook->book->author->name}}</em></td>
                                    <td>{{$requestedbook->user->name}}</td>
                                    <td>{{$requestedbook->book->publisher->name}}</td>
                                    <td>{{$requestedbook->book->ISBN}}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- ================ USER DASHBOARD ================== --}}
                    @else
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $userequestedbooks }}</h1>
                                     <p class="card-text uppercase">Requested Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $useracceptedbooks }}</h1>
                                     <p class="card-text uppercase">Accepted Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-dark mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $userpendingbooks }}</h1>
                                     <p class="card-text uppercase">Pending Books</p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                 <div class="card-body">
                                     <h1 class="card-title">{{ $userejectedbooks }}</h1>
                                     <p class="card-text uppercase">Rejected Books</p>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="card-header mt-3 border-top border-left border-right width100">
                            Accepted Books
                        </div>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Book</th>
                              <th>Member</th>
                              <th>Issued Date</th>
                              <th>Expiry Date</th>
                              <th>Remain Days</th>
                              <th>Returned Date</th>
                              <th>Penalty</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $status_arr = array();
                            @endphp

                            @foreach($userissuedbooks as $key => $issuedbook)
                            @php
                              $today  = date_create(date("Y-m-d"));
                              $expiry = date_create($issuedbook->expiry_date);
                              $diff   = date_diff($today,$expiry);
                              $remain = $diff->format("%R%a days");
                              $status = (int)$diff->format("%R%a");

                              array_push($status_arr, array($issuedbook->id, $issuedbook->status, $status));

                              $retu_d = date_create($issuedbook->return_date);
                              $diff_r = date_diff($retu_d,$expiry);
                              $retu_r = $diff_r->format("%R%a days");

                            @endphp
                            <tr>
                              <th scope="row">{{++$key}}.</th>
                              <td>{{$issuedbook->book->title}} <em>by {{$issuedbook->book->author->name}}</em></td>
                              <td>{{$issuedbook->user->name or null}}</td>
                              <td>{{$issuedbook->issued_date}}</td>
                              <td>{{$issuedbook->expiry_date}}</td>
                              <td>
                                @if($issuedbook->status == 'borrowed' || $issuedbook->status == 'late')
                                  <span>{{ $remain }}</span>
                                @elseif($issuedbook->status == 'returned')
                                  <span class="badge badge-success">{{ $retu_r }}</span>
                                @elseif($issuedbook->status == 'lost')
                                  <span class="badge badge-dark">{{ $retu_r }}</span>
                                @endif
                              </td>
                              <td>{{$issuedbook->return_date or null}}</td>
                              <td>
                                @if($issuedbook->status == 'lost')
                                  {{$issuedbook->book->price}} +
                                  {{$issuedbook->penalty_money}}
                                @else
                                  {{$issuedbook->penalty_money}}
                                @endif
                              </td>

                              <td class="text-center">
                                @if($issuedbook->status == 'borrowed')
                                  <span class="badge badge-warning">Borrowed</span>
                                @elseif($issuedbook->status == 'returned')
                                  <span class="badge badge-success">Returned</span>
                                @elseif($issuedbook->status == 'late')
                                  <span class="badge badge-danger">Late</span>
                                @elseif($issuedbook->status == 'lost')
                                  <span class="badge badge-dark">Lost</span>
                                @else
                                  <span class="badge badge-info">null</span>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
