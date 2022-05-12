@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.transactions.store') }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Transaction') }}</h4>
                                <p class="card-category">{{ __('this is the Transaction that you want to add') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Billable_Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('billable_type') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('billable_type') ? ' is-invalid' : '' }}"
                                                name="billable_type" id="input-billable_type" type="text"
                                                placeholder="{{ __('Reservation OR Salary') }}" />
                                            @if ($errors->has('billable_type'))
                                                <span id="billable_type-error" class="error text-danger"
                                                    for="input-billable_type">{{ $errors->first('billable_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Reservation Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('billable_id') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('billable_id') ? ' is-invalid' : '' }}"
                                                name="billable_id" id="input-billable_id" type="integer"
                                                placeholder="{{ __('Enter the Number of Reservation OR Salary ') }}" />
                                            @if ($errors->has('billable_id'))
                                                <span id="billable_id-error" class="error text-danger"
                                                    for="input-billable_id">{{ $errors->first('billable_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                                     --}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" value="IN"id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Default radio
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" value="OUT" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Default checked radio
                                        </label>
                                      </div>
                                {{-- </div> --}}
                                {{-- <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('National_ID') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" id="input-national_id" type="string" placeholder="{{ __('National ID of Customer') }}" required />
                      @if ($errors->has('national_id'))
                        <span id="national_id-error" class="error text-danger" for="input-national_id">{{ $errors->first('national_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" id="input-country" type="string" placeholder="{{ __('Country') }}" required />
                      @if ($errors->has('country'))
                        <span id="country-error" class="error text-danger" for="input-country">{{ $errors->first('country') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('phone') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-phone_number" type="tel" placeholder="{{ __('Customer phone_number') }}" required />
                      @if ($errors->has('phone_number'))
                        <span id="phone_number-error" class="error text-danger" for="input-phone_number">{{ $errors->first('phone_number') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Check-in') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('started_at') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('started_at') ? ' is-invalid' : '' }}" name="started_at" id="input-started_at" type="date" placeholder="{{ __('Customer Check-in') }}" required />
                        @if ($errors->has('started_at'))
                          <span id="started_at-error" class="error text-danger" for="input-started_at">{{ $errors->first('started_at') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Check-out') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('ended_at') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" name="ended_at" id="input-ended_at" type="date" placeholder="{{ __('Customer Check-out') }}" required />
                        @if ($errors->has('ended_at'))
                          <span id="ended_at-error" class="error text-danger" for="input-ended_at">{{ $errors->first('ended_at') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  {{-- Room element --}}
                                {{-- <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Room') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('room_id') ? ' has-danger' : '' }}">
                        <select
                        class="form-control{{ $errors->has('room_id') ? ' is-invalid' : '' }}"
                        name="room_id" id="input-room_id" type="text"
                        placeholder="{{ __('Room') }}"
                        required> --}}
                                {{-- @foreach ($rooms as $room)
                            <option value="{{ $room->id }}"> {{$room->number}} </option>
                        @endforeach --}}
                                {{-- </select>
                        @if ($errors->has('room_id'))
                          <span id="room_id-error" class="error text-danger" for="input-room_id">{{ $errors->first('room_id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Paid') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('paid') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('paid') ? ' is-invalid' : '' }}"
                        name="paid" id="input-paid" type="text"
                        placeholder="{{ __('paid') }}" required />
                        @if ($errors->has('paid'))
                          <span id="paid-error" class="error text-danger" for="input-paid">{{ $errors->first('paid') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Paid At') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('paid_at') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('paid_at') ? ' is-invalid' : '' }}"
                        name="paid_at" id="input-paid_at" type="date"
                        placeholder="{{ __('paid_at') }}" required />
                        @if ($errors->has('paid_at'))
                          <span id="paid_at-error" class="error text-danger" for="input-paid_at">{{ $errors->first('paid_at') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Offer') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('offer_id') ? ' has-danger' : '' }}">
                        <select
                        class="form-control{{ $errors->has('offer_id') ? ' is-invalid' : '' }}"
                        name="offer_id" id="input-offer_id" type="text"
                        placeholder="{{ __('offer name') }}"
                        required>
                    </select>
                        @if ($errors->has('offer_id'))
                          <span id="offer_id-error" class="error text-danger" for="input-offer_id">{{ $errors->first('offer_id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

              </div> --}}
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                            name="description" id="input-description" type="text"
                            placeholder="{{ __('Description of Transaction Process ') }}" />
                        @if ($errors->has('description'))
                            <span id="description-error" class="error text-danger"
                                for="input-description">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                        <input
                            class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                            name="amount" id="input-amount" type="text"
                            placeholder="{{ __('amount of Transaction Process ') }}" />
                        @if ($errors->has('amount'))
                            <span id="amount-error" class="error text-danger"
                                for="input-amount">{{ $errors->first('amount') }}</span>
                        @endif
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
    </form>
    </div>
    </div>
    </div>
    </div>
@endsection
