@extends('layouts.app', ['activePage' => 'setting', 'titlePage' => __('setting')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.settings.update', 'test') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Setting') }}</h4>
                                <p class="card-category">{{ __('Setting information') }}</p>
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
                                <div class="row mb-4">
                                    <div class="mb-3 m-auto">
                                        <img class="img-thumbnail"
                                            src="{{ URL::asset('attachments/setting/' . $setting['hotel_logo']) }}"
                                            style="box-shadow:0 0.7rem 0.6rem 0.2rem rgb(0 0 0 / 10%)">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('hotel name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hotel_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('hotel_name') ? ' is-invalid' : '' }}"
                                                name="hotel_name" id="input-name" type="text"
                                                placeholder="{{ __('hotel name') }}" required="true"
                                                value="{{ $setting['hotel_name'] }}" aria-required="true" />
                                            @if ($errors->has('hotel_name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('hotel_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('hotel email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hotel_email') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('hotel_email') ? ' is-invalid' : '' }}"
                                                name="hotel_email" id="input-name" type="email"
                                                placeholder="{{ __('hotel email') }}" required="true"
                                                value="{{ $setting['hotel_email'] }}" aria-required="true" />
                                            @if ($errors->has('hotel_email'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('hotel_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('hotel phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hotel_phone') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('hotel_phone') ? ' is-invalid' : '' }}"
                                                name="hotel_phone" id="input-name" type="text"
                                                placeholder="{{ __('hotel phone') }}" required="true"
                                                value="{{ $setting['hotel_phone'] }}" aria-required="true" />
                                            @if ($errors->has('hotel_phone'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('hotel_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('hotel address') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('hotel_address') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('hotel_address') ? ' is-invalid' : '' }}"
                                                name="hotel_address" id="input-name" type="text"
                                                placeholder="{{ __('hotel address') }}" required="true"
                                                value="{{ $setting['hotel_address'] }}" aria-required="true" />
                                            @if ($errors->has('hotel_address'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('hotel_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">Hotel logo</label>
                                    <div class="col-sm-7">
                                        <div class="file-upload">
                                            <div class="file-upload-select">
                                                <div class="file-select-button">Choose File</div>
                                                <div class="file-select-name">No file chosen...</div>
                                                <input type="file" name="logo" accept="image/*" id="file-upload-input">
                                            </div>
                                        </div>
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
    <script>
        let fileInput = document.getElementById("file-upload-input");
        let fileSelect = document.getElementsByClassName("file-upload-select")[0];
        fileSelect.onclick = function() {
            fileInput.click();
        }
        fileInput.onchange = function() {
            let filename = fileInput.files[0].name;
            let selectName = document.getElementsByClassName("file-select-name")[0];
            selectName.innerText = filename;
        }
    </script>
@endpush
