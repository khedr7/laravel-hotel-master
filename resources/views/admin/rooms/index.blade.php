@extends('layouts.app', ['activePage' => 'rooms', 'titlePage' => __('rooms')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Room ') }}</h4>
                            <p class="card-category"> Here you can manage rooms </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary">Add
                                        rooms </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="{{ route('admin.rooms.index') }}">
                                        <div class="field">
                                            <label class="label">{{ __('Search') }}</label>
                                            <div class="control is-expanded has-icons-left">
                                                <input class="input" type="text" placeholder="Search ..." name="q"
                                                    value="{{ request()->query('q', '') }}">

                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="subtitle is-4">
                                        Filters
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="subtitle is-5 mb-1">
                                                Room Types
                                            </div>
                                            @foreach ($roomTypes as $roomType)
                                                <label class="checkbox">
                                                    <input name="roomTypes[]" type="checkbox" value="{{ $roomType->id }}"
                                                        {{ in_array($roomType->id, request()->query('roomTypes', [])) ? 'checked' : '' }}>
                                                    {{ $roomType->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="subtitle is-5 mb-1">
                                                Status
                                            </div>
                                            @foreach ($items as $item)
                                                <label class="checkbox">
                                                    <input name="room_status[]" type="checkbox"
                                                        value="{{ $item->status }}"
                                                        {{ in_array($item->status, request()->query('room_status', [])) ? 'checked' : '' }}>
                                                    {{ $item->status }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="subtitle is-5 mb-1">
                                                Beds
                                            </div>
                                            @foreach ($items as $item)
                                                <label class="checkbox">
                                                    <input name="room_beds[]" type="checkbox" value="{{ $item->beds }}"
                                                        {{ in_array($item->beds, request()->query('room_beds', [])) ? 'checked' : '' }}>
                                                    {{ $item->beds }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="subtitle is-5 mb-1">
                                                Story
                                            </div>
                                            @foreach ($items as $item)
                                                <label class="checkbox">
                                                    <input name="room_story[]" type="checkbox" value="{{ $item->story }}"
                                                        {{ in_array($item->story, request()->query('room_story', [])) ? 'checked' : '' }}>
                                                    {{ $item->story }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="subtitle is-4">
                                        Sort By :
                                    </div>
                                    <div class="form-group">
                                        <div class="input-prepend">
                                            <div class="input-text">
                                                <label> <input type="radio" name="sort" value="number"
                                                        {{ 'number' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Number') }}</label>
                                                <label> <input type="radio" name="sort" value="beds"
                                                        {{ 'beds' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Beds') }}</label>
                                                <br>
                                                <label> <input type="radio" name="sort" value="price"
                                                        {{ 'price' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Price') }}</label>
                                                <label> <input type="radio" name="sort" value="story"
                                                        {{ 'story' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Story') }}</label>
                                                <br>
                                                <label> <input type="radio" name="sort" value="roomType"
                                                        {{ 'roomType' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Room Type') }}</label>
                                                <label> <input type="radio" name="sort" value="creation_date"
                                                        {{ 'creation_date' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Creation Date') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subtitle is-4">
                                        Order By :
                                    </div>
                                    <div class="form-group">
                                        <div class="input-prepend">
                                            <div class="input-text">
                                                <label> <input type="radio" name="order" value="ascending"
                                                        {{ 'ascending' == request()->query('order') ? 'checked' : '' }}>
                                                    {{ __('Ascending') }}</label>
                                                <label> <input type="radio" name="order" value="descending"
                                                        {{ 'descending' == request()->query('order') ? 'checked' : '' }}>
                                                    {{ __('Descending') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">search <span
                                            class="material-icons">
                                            search
                                        </span></button>
                                </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Number
                                            </th>
                                            <th>
                                                Story
                                            </th>
                                            <th>
                                                Beds
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                status
                                            </th>
                                            <th>
                                                Room Type
                                            </th>
                                            <th>
                                                Creation date
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.rooms.show', $room) }}">{{ $room->number }}</a>
                                                </td>
                                                <td>
                                                    {{ $room->story }}
                                                </td>
                                                <td>
                                                    {{ $room->beds }}
                                                </td>
                                                <td>
                                                    {{ $room->price }}$
                                                </td>
                                                <td>
                                                    {{ $room->status }}
                                                </td>
                                                <td>
                                                    {{ $room->roomType->name }}
                                                </td>
                                                <td>
                                                    {{ $room->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.rooms.destroy', $room) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.rooms.edit', $room) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto">
                                    {{ $rooms->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
