@extends('layouts.app', ['activePage' => 'roomTypes', 'titlePage' => __('RoomType')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.room-types.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Room Type information') }}</h4>
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
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.room-types.edit', $roomType) }}"
                                            class="btn btn-sm btn-primary">Edit
                                            room type</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Arbic name</strong> : <br>
                                                {{ $roomType->getTranslation('name', 'ar') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>English name</strong> : <br>
                                                {{ $roomType->getTranslation('name', 'en') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Price</strong> : <br> {{ $roomType->price }}$</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Created at</strong> : <br> {{ $roomType->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Arabic description</strong> : <br>
                                                {{ $roomType->getTranslation('description', 'ar') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>English description</strong> : <br>
                                                {{ $roomType->getTranslation('description', 'ar') }} <br>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
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
