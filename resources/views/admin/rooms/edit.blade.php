@extends('layouts.app', ['activePage' => 'rooms', 'titlePage' => __('Edit Room')])

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
                    <form method="POST" action="{{ route('admin.rooms.update', $room) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Room') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                                                name="number" id="input-number" type="text"
                                                placeholder="{{ __('Number') }}" value="{{ $room->number }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('number'))
                                                <span id="number-error" class="error text-danger"
                                                    for="input-number">{{ $errors->first('number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Beds') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('beds') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('beds') ? ' is-invalid' : '' }}"
                                                name="beds" id="input-beds" type="text" placeholder="{{ __('Beds') }}"
                                                value="{{ $room->beds }}" required="true" aria-required="true" />
                                            @if ($errors->has('beds'))
                                                <span id="beds-error" class="error text-danger"
                                                    for="input-beds">{{ $errors->first('beds') }}</span>
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
                                                value="{{ $room->price }}" required="true" aria-required="true" />
                                            @if ($errors->has('price'))
                                                <span id="price-error" class="error text-danger"
                                                    for="input-price">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Story') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('story') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('story') ? ' is-invalid' : '' }}"
                                                name="story" id="input-story" type="text" placeholder="{{ __('Story') }}"
                                                value="{{ $room->story }}" required="true" aria-required="true" />
                                            @if ($errors->has('story'))
                                                <span id="story-error" class="error text-danger"
                                                    for="input-story">{{ $errors->first('story') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Room Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('room_type_id') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('room_type_id') ? ' is-invalid' : '' }}"
                                                name="room_type_id" id="input-room_type_id" type="text"
                                                placeholder="{{ __('Room Type') }}" value="{{ old('room_type_id') }}"
                                                required="true" aria-required="true">
                                                @foreach ($roomTypes as $roomType)
                                                    <option
                                                        value="{{ $roomType->id }}
                                                                    {{ $roomType->id == old('roomType_id') ? 'selected' : '' }}">
                                                        {{ $roomType->name }}/{{ $roomType->getTranslation('name', 'ar') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('room_type_id'))
                                                <span id="room_type_id-error" class="error text-danger"
                                                    for="input-room_type_id">{{ $errors->first('room_type_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Arabic Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has("status['ar']") ? ' has-danger' : '' }}">
                                            <textarea id="summernote" placeholder="{{ __('Arabic Status') }}"
                                                name="status[ar]">{{ old("status['ar']") }}</textarea>
                                            <input
                                                class="form-control{{ $errors->has("status['ar']") ? ' is-invalid' : '' }}"
                                                name="status[ar]" id="input-status-ar" type="text"
                                                placeholder="{{ __('Arabic status') }}"
                                                value="{{ $room->getTranslation('status', 'ar') }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has(" status['ar']"))
                                                <span id="status-ar-error" class="error text-danger"
                                                    for="input-status-ar">{{ $errors->first("status['ar']") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('English Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has("status['en']") ? ' has-danger' : '' }}">
                                            <textarea id="summernote" placeholder="{{ __('English Status') }}"
                                                name="status[en]">{{ old("status['en']") }}</textarea>
                                            <input
                                                class="form-control{{ $errors->has("status['en']") ? ' is-invalid' : '' }}"
                                                name="status[en]" id="input-status-en" type="text"
                                                placeholder="{{ __('English status') }}" value="{{ $room->status }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has(" status['en']"))
                                                <span id="status-en-error" class="error text-danger"
                                                    for="input-status-en">{{ $errors->first("status['en']") }}</span>
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
                                                value="{{ $room->getTranslation('description', 'ar') }}" required="true"
                                                aria-required="true" />
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
                                                value="{{ $room->description }}" required="true" aria-required="true" />
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
                                                placeholder="{{ __('Upload Images') }}" value="{{ $mediaItems }}"
                                                required="true" aria-required="true" />
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
