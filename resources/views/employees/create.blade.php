@extends('layouts.app', ['activePage' => 'Employees', 'titlePage' => __('New employees')])

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.employees.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Employee information') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Full Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text"
                                                placeholder="{{ __('Full Name') }}" value="{{ old('name') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Job Ttle') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('job_title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}"
                                                name="job_title" id="input-job_title" type="text"
                                                placeholder="{{ __('job_title') }}" value="{{ old('job_title') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('job_title'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-job_title">{{ $errors->first('job_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name="phone" id="input-phone" type="text"
                                                placeholder="{{ __('Phone') }}" value="{{ old('phone') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('phone'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" id="input-password" type="text"
                                                placeholder="{{ __('password') }}" value="{{ old('password') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('password'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                name="country" id="input-country" type="text"
                                                placeholder="{{ __('Country') }}" value="{{ old('country') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('country'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-country">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('National ID') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}"
                                                name="national_id" id="input-national_id" type="text"
                                                placeholder="{{ __('National ID') }}" value="{{ old('national_id') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('national_id'))
                                                <span id="title-ar-error" class="error text-danger"
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
                                                name="salary" id="input-salary" type="text"
                                                placeholder="{{ __('Salary') }}" value="{{ old('salary') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('salary'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-salary">{{ $errors->first('salary') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Featured Image') }}</label>
                                    <div class="col-sm-7">
                                        <div
                                            class="{{ $errors->has('featured_image') ? ' has-danger' : '' }} form-file-upload form-file-simple">
                                            <input type="file" class="form-control" name="featured_image">
                                            @if ($errors->has('featured_image'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('featured_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('admin.employees.index') }}"class="btn btn-primary">{{ __('Go Back') }}</a>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
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
