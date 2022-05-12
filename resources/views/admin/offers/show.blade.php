
@extends('layouts.app', ['activePage' => 'offers', 'titlePage' => __('Offer Information')])


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                                {{ app()->getLocale() == 'en' ? $offer->name_en : $offer->name_ar }}</h4>
                            <p class="card-category"> Information about the offer</p>
                        </div>
                        <div class="card-body">
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

                                        <tr>
                                            <td>
                                                {{ $offer->name }}
                                            </td>
                                            <td>
                                                {{ $offer->discount }}
                                            </td>
                                            <td>
                                                {{ $offer->type }}
                                            </td>
                                            <td>
                                                {{ $offer->started_at }}
                                            </td>
                                            <td>
                                                {{ $offer->ended_at }}
                                            </td>


                                            <td class="td-actions text-right">
                                                <form action="{{ route('admin.offers.destroy', $offer) }}" method="post">
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
                                            </td>
                                        </tr>

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
