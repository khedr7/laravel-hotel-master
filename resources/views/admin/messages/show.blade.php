@extends('layouts.app', ['activePage' => 'messages', 'titlePage' => 'Messages'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Message') }}</h4>
                                <p class="card-category">{{ __('Message info') }}</p>
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
                                        {{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="title" id="input-name" type="text"
                                                value="{{ $message->title }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="input-name" type="email"
                                                value="{{ $message->email }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <textarea disabled name="content" class="form-control"
                                                aria-label="With textarea">
                                                                            {{ $message->content }}
                                                                        </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">
                                        {{ __('Type') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="type" id="input-name" type="text"
                                                value="{{ $message->type }}" required="true" aria-required="true"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer ml-auto mr-auto">
                        <a href="{{ route('admin.messages.create') }}"><button type="submit"
                                class="btn btn-primary">{{ __('Reply') }}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
