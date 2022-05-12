@extends('layouts.app', ['activePage' => 'customers', 'titlePage' => __('Add Customers')])
@section('content')
    <h1>Create customer</h1>
    <div class="container">
        <form action="{{ route('admin.customers.store') }}" method="POST">
            @csrf
            First Name <input type="text" name="name" placeholder="First Name"> <br>
            National Number <input type="text" name="national_id" placeholder="National Number"> <br>
            Phone <input type="text" name="phone_number" placeholder="First Name"> <br>
            Country <input type="text" name="country" placeholder="country"> <br>
            <input type="submit" value="submit">
        </form>
    </div>
@endsection
