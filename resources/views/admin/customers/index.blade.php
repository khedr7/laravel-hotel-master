@extends('layouts.app', ['activePage' => 'customers', 'titlePage' => __('All Customers')])
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
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.customers.create') }}" class="btn btn-sm btn-primary">Add
                                        Customer</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>id</th>
                                            <th>First Name</th>
                                            <th>National ID</th>
                                            <th>Country</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->national_id }}</td>
                                                <td>{{ $customer->country }}</td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.customers.destroy', $customer) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.customers.edit', $customer) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-link"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">delete</i>
                                                            <div class="ripple-container"></div>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto">
                                    {{ $customers->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
