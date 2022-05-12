@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Transactions')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Transactions</h4>
            <p class="card-category"> This is the Page that Shows you all of the Transactions</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                  <a href="{{ route('admin.transactions.create') }}" class="btn btn-sm btn-primary">Add
                      Transaction</a>
              </div>
          </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Type
                  </th>
                  <th>
                    Amount
                  </th>
                  <th>
                    Descreption
                  </th>
                  <th>
                    Billable_id
                  </th>
                  <th>
                    Billable_Type
                  </th>

                </thead>
                <tbody>
                    <tr>
                        @foreach ($transactions as $transaction)
                            <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->type}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->billable_id}}</td>
                            <td>{{$transaction->billable_type}}</td>
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
