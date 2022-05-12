@extends('layouts.app', ['activePage' => 'offers', 'titlePage' => __('Edit Offer')])

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
                    <form method="post" action="{{ route('admin.offers.update', $offer) }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Offer information') }}</h4>
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
                                        <div class="form-group{{ $errors->has('name_ar') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}"
                                                name="name_ar" id="input-name_ar" placeholder="{{ __('Arabic name') }}"
                                                required>{{ $offer->getTranslation('name','ar') }}</textarea>
                                            @if ($errors->has('name_ar'))
                                                <span id="name_ar-error" class="error text-danger"
                                                    for="input-name_ar">{{ $errors->first('name_ar') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('English Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name_en') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}"
                                                name="name_en" id="input-name_en" placeholder="{{ __('English Name') }}"
                                                required>{{ $offer->getTranslation('name','en') }}</textarea>
                                            @if ($errors->has('name_en'))
                                                <span id="name_en-error" class="error text-danger"
                                                    for="input-name_en">{{ $errors->first('name_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Discount') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                            <textarea
                                                class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}"
                                                name="discount" id="input-discount"
                                                placeholder="{{ __('Discount') }}"
                                                required>{{ $offer->discount}}</textarea>
                                            @if ($errors->has('discount'))
                                                <span id="discount-error" class="error text-danger"
                                                    for="input-discount">{{ $errors->first('discount') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">

                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <label> <input type="radio" name="type"  value="const" {{$offer->type == "const" ? 'checked' : ''}}>{{__('main_trans.Const')}}</label>
                                            <label> <input type="radio" name="type"  value="percentage" {{$offer->type == 'percentage' ? 'checked' : ''}}>{{__('main_trans.Percentage')}}</label>
                                        </div>
                                    </div>


                                            @if ($errors->has('type'))
                                                <span id="type_en-error" class="error text-danger"
                                                    for="input-type">{{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('started_at') ? ' has-danger' : '' }}">
                                            <input type="date"
                                                class="form-control{{ $errors->has('started_at') ? ' is-invalid' : '' }}"
                                                name="started_at" id="input-started_at" placeholder="{{ __('Start Date') }}"
                                                required value="{{ $offer->started_at }}"/>
                                            @if ($errors->has('started_at'))
                                                <span id="started_at-error" class="error text-danger"
                                                    for="input-started_at">{{ $errors->first('started_at') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ended_at') ? ' has-danger' : '' }}">
                                            <input type="date"
                                                class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}"
                                                name="ended_at" id="input-ended_at" placeholder="{{ __('End Date') }}"
                                                required value="{{  $offer->ended_at }}"/>
                                            @if ($errors->has('ended_at'))
                                                <span id="ended_at-error" class="error text-danger"
                                                    for="input-ended_at">{{ $errors->first('ended_at') }}</span>
                                            @endif
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
