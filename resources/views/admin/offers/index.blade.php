@extends('layouts.app', ['activePage' => 'offers', 'titlePage' => __('offers')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Offers') }}</h4>
                            <p class="card-category"> Here you can manage Offers</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.offers.create') }}" class="btn btn-sm btn-primary">Add
                                        Offers</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>

                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Discount
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Start date
                                                </th>
                                                <th>
                                                    End date
                                                </th>

                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                            <tr>

                                                    <td>

                                                        <a href="{{ route('admin.offers.show', $offer) }}">
                                                            {{ $offer->name }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if ($offer->type=="const")
                                                        {{ $offer->discount }}
                                                        @elseif($offer->type=="percentage")
                                                        {{ $offer->discount }}
                                                        {{'%'}}
                                                        @endif


                                                    </td>

                                                    <td>

                                                        @if ($offer->type=="const")
                                                        {{__('main_trans.Const')}}
                                                        @elseif($offer->type=="percentage")
                                                        {{__('main_trans.Percentage')}}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{ $offer->started_at }}
                                                    </td>
                                                    <td>
                                                        {{ $offer->ended_at }}
                                                    </td>



                                                    <td class="td-actions text-right">
                                                        <form action="{{ route('admin.offers.destroy', $offer) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                                href="{{ route('admin.offers.edit', $offer) }}"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">delete</i>
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                        </form>
                                                    </td>                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto">
                                    {{ $offers->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
