@extends('layouts.app', ['activePage' => 'roomTypes', 'titlePage' => __('roomTypes')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Room Types') }}</h4>
                            <p class="card-category"> Here you can manage room types</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.room-types.create') }}" class="btn btn-sm btn-primary">Add
                                        room types</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="{{ route('admin.room-types.index') }}">
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
                                    <div class="subtitle is-5 mb-1">
                                        Price
                                    </div>
                                    @foreach ($items as $item)
                                        <label class="checkbox">
                                            <input name="price_filter[]" type="checkbox" value="{{ $item->price }}"
                                                {{ in_array($item->price, request()->query('price_filter', [])) ? 'checked' : '' }}>
                                            {{ $item->price }}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    <div class="subtitle is-4">
                                        Sort By :
                                    </div>
                                    <div class="form-group">
                                        <div class="input-prepend">
                                            <div class="input-text">
                                                {{-- <label> <input type="radio" name="sort" value="name_ar"
                                                        {{ 'name_ar' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Arabic name') }}</label>
                                                <label> <input type="radio" name="sort" value="name_en"
                                                        {{ 'name_en' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('English name') }}</label>
                                                <br> --}}
                                                <label> <input type="radio" name="sort" value="price"
                                                        {{ 'price' == request()->query('sort') ? 'checked' : '' }}>
                                                    {{ __('Price') }}</label>
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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    English name
                                                </th>
                                                <th>
                                                    Arabic name
                                                </th>
                                                <th>
                                                    Price
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
                                            @foreach ($roomTypes as $roomType)
                                                <tr>
                                                    <td>
                                                        <a
                                                            href="{{ route('admin.room-types.show', $roomType) }}">{{ $roomType->name }}</a>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{ route('admin.room-types.show', $roomType) }}">{{ $roomType->getTranslation('name', 'ar') }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $roomType->price }}$ </td>
                                                    <td>
                                                        {{ $roomType->created_at }}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <form action="{{ route('admin.room-types.destroy', $roomType) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                                href="{{ route('admin.room-types.edit', $roomType) }}"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-danger btn-link" data-original-title=""
                                                                title="">
                                                                <i class="material-icons">delete</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-center m-auto">
                                        {{ $roomTypes->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
