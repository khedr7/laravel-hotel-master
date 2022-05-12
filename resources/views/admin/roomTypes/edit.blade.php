@extends('layouts.app', ['activePage' => 'roomTypes', 'titlePage' => __('Edit Room Type')])

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

{{-- @push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endpush --}}

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.room-types.update', $roomType) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Room Type') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Arabic Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has("name['ar']") ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has("name['ar']") ? ' is-invalid' : '' }}"
                                                name="name[ar]" id="input-name-ar" type="text"
                                                placeholder="{{ __('Arabic Name') }}"
                                                value="{{ $roomType->getTranslation('name', 'ar') }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has(" name['ar']"))
                                                <span id="name-ar-error" class="error text-danger"
                                                    for="input-name-ar">{{ $errors->first("name['ar']") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('English Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has("name['en']") ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has("name['en']") ? ' is-invalid' : '' }}"
                                                name="name[en]" id="input-name-en" type="text"
                                                placeholder="{{ __('English Name') }}"
                                                value="{{ $roomType->getTranslation('name', 'en') }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has(" name['en']"))
                                                <span id="name-en-error" class="error text-danger"
                                                    for="input-name-en">{{ $errors->first("name['en']") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                name="price" id="input-price" type="text" placeholder="{{ __('Price') }}"
                                                value="{{ $roomType->price }}" required="true" aria-required="true" />
                                            @if ($errors->has('price'))
                                                <span id="price-error" class="error text-danger"
                                                    for="input-price">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Arabic Description') }}</label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group{{ $errors->has("description['ar']") ? ' has-danger' : '' }}">
                                            <textarea id="summernote" placeholder="{{ __('Arabic description') }}"
                                                name="description[ar]">{{ old("description['ar']") }}</textarea>
                                            <input
                                                class="form-control{{ $errors->has("description['ar']") ? ' is-invalid' : '' }}"
                                                name="description[ar]" id="input-description-ar" type="text"
                                                placeholder="{{ __('Arabic Description') }}"
                                                value="{{ $roomType->getTranslation('description', 'ar') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has(" description['ar']"))
                                                <span id="description-ar-error" class="error text-danger"
                                                    for="input-description-ar">{{ $errors->first("description['ar']") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('English Description') }}</label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group{{ $errors->has("description['en']") ? ' has-danger' : '' }}">
                                            <textarea id="summernote" placeholder="{{ __('English description') }}"
                                                name="description[en]">{{ old("description['en']") }}</textarea>
                                            <input
                                                class="form-control{{ $errors->has("description['en']") ? ' is-invalid' : '' }}"
                                                name="description[en]" id="input-description-en" type="text"
                                                placeholder="{{ __('English Description') }}"
                                                value="{{ $roomType->getTranslation('description', 'en') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has(" description['en']"))
                                                <span id="description-en-error" class="error text-danger"
                                                    for="input-description-en">{{ $errors->first("description['en']") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Images') }}</label>
                                    <div class="col-sm-7">
                                        <div class="custom-file {{ $errors->has('images') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control file{{ $errors->has('images') ? ' is-invalid' : '' }}"
                                                name="images[]" id="input-images" type="file" multiple="multiple"
                                                placeholder="{{ __('Upload Images') }}"
                                                value="{{ $roomType->getMedia('images') }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('images'))
                                                <span id="images-error" class="error text-danger"
                                                    for="input-images">{{ $errors->first('images') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <span><strong>Images</strong> : <br>
                                    <div class="row">
                                        @foreach ($mediaItems as $mediaItem)
                                            <div class="col-md-4">
                                                <img src="{{ $mediaItem->getUrl() }}" / width="240px">
                                            </div>
                                        @endforeach
                                    </div>
                                </span>
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
