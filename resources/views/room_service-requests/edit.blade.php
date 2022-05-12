@extends('layouts.app', ['activePage' => 'room-service-requests', 'titlePage' => __('Edit Service Request')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.room-service-requests.update', $roomSeviceRequest) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Service Request') }}</h4>
                            </div>
                            <div class="card-body ">
                                {{-- @if ($errors->any())
                                    <div class="callout callout-danger">
                                        <h5>
                                            <i class="icon fas fa-ban " style="margin-right: 10px;color: #dd1616;"></i>Form Error
                                        </h5>
                                        <ul class="list-unstyled" style="margin-left: 1.9rem;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('room service name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('room-service-name') ? ' has-danger' : '' }}">
                                            {{-- @if ($errors->has('room-service-name'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('room-service-name') }}</span>
                                            @endif --}}
                                            <select name="room_service_id" id="roomservice_id" class="custom-select" data-live-search="true" data-default="{{ old('roomservice_id') }}">
                                                @foreach ($roomservices as $roomservice)
                                                       <option value="{{ $roomservice->id }}" selected="selected">{{ $roomservice->name }}</option>
                                               @endforeach
                                               <option value="{{$roomSeviceRequest->room_service_id}}" selected="selected">{{$roomservicename}}</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Employee Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Employee-name') ? ' has-danger' : '' }}">

                                            {{-- @if ($errors->has('Employee-name'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('Employee-name') }}</span>
                                            @endif --}}
                                            <select name="employee_id" id="employee_id" class="custom-select" data-live-search="true" data-default="{{ old('employee_id') }}">
                                                     @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}" selected="selected">{{ $employee->name }}</option>
                                                    @endforeach
                                                    <option value="{{$roomSeviceRequest->employee_id}}" selected="selected">{{$employeename}}</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Reservation') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Reservation') ? ' has-danger' : '' }}">

                                            {{-- @if ($errors->has('Reservation'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('Reservation') }}</span>
                                            @endif --}}
                                             <select name="customer_id" id="customer_id" class="custom-select" data-live-search="true" data-default="{{ old('customer_id') }}">
                                                @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" selected="selected">{{ $customer->name }}</option>f

                                               @endforeach
                                               <option value="{{$customer_id}}" selected="selected">{{$custname}}</option>
                                            </select>

                                            <select  name="room_id" id="room_id" class="custom-select" data-live-search="true" data-default="{{ old('room_id') }}">

                                               @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}" selected="selected">{{ $room->number }}</option>f

                                               @endforeach
                                               <option value="{{$roomSeviceRequest->room_id}}" selected="selected">{{$roomnumber}}</option>
                                           </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('notes') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('notes') ? ' has-danger' : '' }}">
                                            <input  type="text"
                                                    name="notes"
                                                    class="form-control @error('notes') is-invalid @enderror"
                                                    placeholder="Enter notes"
                                                    value="{{ $notes }}">
                                            {{-- @if ($errors->has('notes'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('notes') }}</span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush
