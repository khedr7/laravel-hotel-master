@extends('layouts.app', ['activePage' => 'rooms', 'titlePage' => __('Room')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.rooms.store') }}" autocomplete="off"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Room information') }}</h4>
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
                                        <a href="{{ route('admin.rooms.edit', $room) }}"
                                            class="btn btn-sm btn-primary">Edit
                                            room</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Number</strong> : <br>
                                                {{ $room->number }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Beds</strong> : <br>
                                                {{ $room->beds }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Price</strong> : <br>
                                                {{ $room->price }}$ </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Story</strong> : <br>
                                                {{ $room->story }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Arabic Room Type</strong> : <br>
                                                {{ $room->roomType->getTranslation('name', 'ar') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>English Room Type</strong> : <br>
                                                {{ $room->roomType->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Arabic Status</strong> : <br>
                                                {{ $room->getTranslation('status', 'ar') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>English Status</strong> : <br>
                                                {{ $room->status }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>Arabic description</strong> : <br>
                                                {{ $room->getTranslation('description', 'ar') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <span><strong>English description</strong> : <br>
                                                {{ $room->description }}</span>
                                        </div>
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
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <span><strong>Created at</strong> : <br>
                                            {{ $room->created_at }}</span>
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
