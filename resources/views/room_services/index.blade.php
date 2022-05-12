@extends('layouts.app', ['activePage' => 'room-services', 'titlePage' => __('All Services')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('All Services') }}</h4>
                            <p class="card-category">{{ __('Services information') }}</p>
                        </div>
                        <div class="card-body ">
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('success') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <a href="{{ route('admin.room-services.create') }}" class="btn btn-primary mt-2">
                                <i class="material-icons">add</i>
                                <span>{{ __('new service') }}</span>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                description
                                            </th>
                                            <th>
                                                price
                                            </th>
                                            <th>
                                                status
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roomServices as $roomService)
                                            <tr>
                                                <td>
                                                    {{ $roomService->name }}
                                                </td>
                                                <td>
                                                    {{ $roomService->description }}
                                                </td>
                                                <td>
                                                    {{ $roomService->price }}<span>$</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($roomService->status == 'active')
                                                        <span class="active-status">{{ $roomService->status }}</span>
                                                    @else
                                                        <span class="disactive-status">{{ $roomService->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $roomService->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form
                                                        action="{{ route('admin.room-services.destroy', $roomService) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a rel="tooltip" class="btn btn-success btn-link text-warning"
                                                            data-target="#show{{ $roomService->id }}"
                                                            data-target="#show{{ $roomService->id }}"
                                                            data-toggle="modal"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">visibility</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.room-services.edit', $roomService) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="submit" class="btn-danger btn btn-link">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            {{-- Start show room service Modal --}}
                                            <div class="modal fade" id="show{{ $roomService->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ __('Room service information') }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="padding: 1rem 2rem;">
                                                            <img    src="{{ asset($roomService->getFirstMediaUrl('room_service')) }}"
                                                                    class="img-thumbnail is-marginless d-block m-auto mb-2"
                                                                    alt="">
                                                            <div class="row">
                                                                <label
                                                                    class="col-sm-6 pb-0 mb-0">{{ __('service Room Name') }}</label>
                                                                <div class="col-sm-12">
                                                                    <div
                                                                        class=" mb-2 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                        <input type="text" readonly name="name"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            placeholder="Enter service Room Name"
                                                                            value="{{ $roomService->name }}">
                                                                        @if ($errors->has('name'))
                                                                            <span id="title-ar-error"
                                                                                class="error text-danger"
                                                                                for="input-title-ar">{{ $errors->first('name') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label
                                                                    class="col-sm-6 pb-0 mb-0">{{ __('description') }}</label>
                                                                <div class="col-sm-12">
                                                                    <div
                                                                        class=" mb-2 form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                                        <textarea type="text" readonly name="description"
                                                                            class="form-control @error('description') is-invalid @enderror"
                                                                            placeholder="Enter service room description"
                                                                            rows="5">{{ $roomService->description }}</textarea>
                                                                        @if ($errors->has('description'))
                                                                            <span id="title-ar-error"
                                                                                class="error text-danger"
                                                                                for="input-title-ar">{{ $errors->first('description') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label
                                                                    class="col-sm-6 pb-0 mb-0">{{ __('Status') }}</label>
                                                                <div class="col-sm-12">
                                                                    <div
                                                                        class=" mb-2 form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                                        <input type="text" readonly name="status"
                                                                            class="form-control @error('status') is-invalid @enderror"
                                                                            placeholder="Enter service room status"
                                                                            value="{{ $roomService->status }}">
                                                                        @if ($errors->has('status'))
                                                                            <span id="title-ar-error"
                                                                                class="error text-danger"
                                                                                for="input-title-ar">{{ $errors->first('status') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label
                                                                    class="col-sm-6 pb-0 mb-0">{{ __('price') }}</label>
                                                                <div class="col-sm-12">
                                                                    <div
                                                                        class=" mb-2 form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                                        <input type="number"  readonly name="price"
                                                                            class="form-control @error('price') is-invalid @enderror"
                                                                            placeholder="Enter service room price"
                                                                            value="{{ $roomService->price }}">
                                                                        @if ($errors->has('price'))
                                                                            <span id="title-ar-error"
                                                                                class="error text-danger"
                                                                                for="input-title-ar">{{ $errors->first('price') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End show room service Modal --}}
                                        @endforeach
                                        {{ $roomServices->links() }}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
