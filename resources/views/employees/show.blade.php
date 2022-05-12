@extends('layouts.app', ['activePage' => 'Employees', 'titlePage' => __('Employee info')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Employee') }}</h4>
                                <p class="card-category">{{ __('Here you can see employee information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="input-name" type="text"
                                                value="{{ $employee->name }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Job Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="job_title" id="input-name" type="text"
                                                value="{{ $employee->job_title }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="phone" id="input-name" type="text"
                                                value="{{ $employee->phone }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password" id="input-name" type="text"
                                                value="{{ $employee->password }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Country') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="country" id="input-name" type="text"
                                                value="{{ $employee->country }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('National ID') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="national_id" id="input-name" type="text"
                                                value="{{ $employee->national_id }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Salary') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="salary" id="input-name" type="text"
                                                value="{{ $employee->salary }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer ml-auto mr-auto">
                        <a href="{{ route('admin.employees.index') }}"><button type="submit"
                                class="btn btn-primary">{{ __('Go Back') }}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
