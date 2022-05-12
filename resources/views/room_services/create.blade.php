@extends('layouts.app', ['activePage' => 'create-room-service', 'titlePage' => __('New Service')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.room-services.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add New Service') }}</h4>
                            </div>
                            <div class="card-body ">
                                @if ($errors->any())
                                    <div class="callout callout-danger">
                                        <h5>
                                            <i class="icon fas fa-ban " style="margin-right: 10px;color: #dd1616;"></i>Form Error
                                        </h5>
                                        <ul class="list-unstyled" style="margin-left: 1.9rem;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('service Room Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input type="text"
                                                    name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Enter service Room Name"
                                                    value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            {{-- <textarea   name="description"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        id="summernote"
                                                        cols="30"
                                                        rows="10"
                                                        placeholder="Description of service">{{ old('description') }}</textarea> --}}
                                            <textarea  type="text"
                                                    name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Enter service room description"
                                                    rows="5">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <input  type="text"
                                                    name="status"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    placeholder="Enter service room status"
                                                    value="{{ old('status') }}">
                                            @if ($errors->has('status'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('price') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <input  type="number"
                                                    name="price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    placeholder="Enter service room price"
                                                    value="{{ old('price') }}">
                                            @if ($errors->has('price'))
                                                <span id="title-ar-error" class="error text-danger"
                                                    for="input-title-ar">{{ $errors->first('price') }}</span>
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
                                                <input type="file" name="image" accept="image/*" id="file-upload-input">
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
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
