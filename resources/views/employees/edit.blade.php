@extends('layouts.app', ['activePage' => 'Employees', 'titlePage' => __('Employees')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.employees.update', $employee) }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Employee Information') }}</h4>
                                <p class="card-category">{{ __('Employee information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('name', $employee->name) }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name="phone" id="input-phone" type="phone"
                                                placeholder="{{ __('Phone') }}"
                                                value="{{ old('phone', $employee->phone) }}" required />
                                            @if ($errors->has('phone'))
                                                <span id="phone-error" class="error text-danger"
                                                    for="input-phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Job Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('job_title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}"
                                                name="job_title" id="input-job_title" type="job_title"
                                                placeholder="{{ __('Job Title') }}"
                                                value="{{ old('job_title', $employee->job_title) }}" required />
                                            @if ($errors->has('job_title'))
                                                <span id="job_title-error" class="error text-danger"
                                                    for="input-job_title">{{ $errors->first('job_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                name="country" id="input-country" type="country"
                                                placeholder="{{ __('country') }}"
                                                value="{{ old('country', $employee->country) }}" required />
                                            @if ($errors->has('country'))
                                                <span id="country-error" class="error text-danger"
                                                    for="input-country">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('National Id') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}"
                                                name="national_id" id="input-national_id" type="national_id"
                                                placeholder="{{ __('national_id') }}"
                                                value="{{ old('national_id', $employee->national_id) }}" required />
                                            @if ($errors->has('national_id'))
                                                <span id="national_id-error" class="error text-danger"
                                                    for="input-national_id">{{ $errors->first('national_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Salary') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('salary') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}"
                                                name="salary" id="input-salary" type="salary"
                                                placeholder="{{ __('salary') }}"
                                                value="{{ old('salary', $employee->salary) }}" required />
                                            @if ($errors->has('salary'))
                                                <span id="salary-error" class="error text-danger"
                                                    for="input-salary">{{ $errors->first('salary') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('admin.employees.index') }}"class="btn btn-primary">{{ __('Go Back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.employees.password') }}" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Change password') }}</h4>
                                <p class="card-category">{{ __('Password') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status_password'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status_password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-current-password">{{ __('Current Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                                input type="password" name="old_password" id="input-current-password"
                                                placeholder="{{ __('Current Password') }}" value="" required />
                                            @if ($errors->has('old_password'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('old_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-password">{{ __('New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password" type="password"
                                                placeholder="{{ __('New Password') }}" value="" required />
                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger"
                                                    for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                id="input-password-confirmation" type="password"
                                                placeholder="{{ __('Confirm New Password') }}" value="" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
