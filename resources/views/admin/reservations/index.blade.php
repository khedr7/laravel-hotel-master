@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Reservations')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Reservations</h4>
            <p class="card-category"> This is the Page that Shows you all of your Reservations</p>
          </div>
          <div class="card-body">

            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.reservations.create') }}" class="btn btn-sm btn-primary">Add
                        Reservation</a>
                </div>
            </div>

            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Customer
                  </th>
                  <th>
                    Due Price
                  </th>
                  <th>
                    Room Number
                  </th>
                  <th>
                    Offer
                  </th>
                  <th>
                    Paid
                  </th>
                  <th>
                    Started_at
                  </th>
                  <th>
                    Ended_at
                  </th>
                  <th>
                    Paid_at
                  </th>
                  <th>
                    Cancelled_at
                  </th>
                  <th>
                    Cancellation
                  </th>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($reservations as $reservation)
                            <tr>
                            <td>{{$reservation->id}}</td>
                            <td>{{$reservation->user->name}}</td>
                            <td>{{$reservation->price}}</td>
                            <td>{{$reservation->room->number}}</td>
                            <td>{{$reservation->offer?->name}}</td>
                            <td>{{$reservation->paid}}</td>
                            <td>{{$reservation->started_at}}</td>
                            <td>{{$reservation->ended_at}}</td>
                            <td>{{$reservation->paid_at}}</td>
                            <td>{{$reservation->canceled_at}}</td>
                            @if (empty($reservation->canceled_at))
                            <td class="td-actions text-right">
                                <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" name="submit">
                                    {{-- <a rel="tooltip" class="btn btn-success btn-link"
                                        href="{{ route('admin.reservations.update', $reservation) }}">
                                        <i class="material-icons">edit</i>{{ $reservation->id }}
                                        <div class="ripple-container"></div>
                                    </a> --}}
                                </form>
                            @endif

                            @endforeach


                            </tr>
                    </tr>
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
