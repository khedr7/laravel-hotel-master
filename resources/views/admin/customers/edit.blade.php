@extends('layouts.app', ['activePage' => 'customers', 'titlePage' => __('Edit a customer')])
@section('content')
    <h1>Create customer</h1>
    <div class="container">
        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            First Name <input type="text" name="name" placeholder="First Name" value="{{ $customer->name }}"> <br>
            National Number <input type="text" name="national_id" placeholder="National Number"
                value="{{ $customer->national_id }}"> <br>
            Phone <input type="text" name="phone_number" placeholder="First Name" value="{{ $customer->phone_number }}">
            <br>
            Country <input type="text" name="country" placeholder="country" value="{{ $customer->country }}"> <br>
            <input type="submit" value="submit">
        </form>
    </div>
@endsection
