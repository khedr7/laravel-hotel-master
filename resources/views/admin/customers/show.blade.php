@extends('layouts.app', ['activePage' => 'Show a Customer', 'titlePage' => __('Show a Customer')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Customers') }}</h4>
                            <p class="card-category"> Customers</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>First Name</th>
                                            <th>National ID</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->national_id }}</td>
                                                <td>{{ $customer->country }}</td>
                                                <td>{{ $customer->phone }}</td>
                                            </tr>
                                        @endforeach
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
