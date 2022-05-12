@extends('layouts.app', ['activePage' => 'All-staffs', 'titlePage' => __('All staffs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('All Staffs') }}</h4>
                            <p class="card-category">{{ __('Staffs information') }}</p>
                        </div>
                        <div class="card-body ">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mt-2">
                                <i class="material-icons">add</i>
                                <span>{{ __('new staff') }}</span>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
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
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.users.destroy', $user) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.users.edit', $user) }}"
                                                            data-original-title="" title="">
                                                            <i class="material-icons">edit</i>{{ $user->id }}
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="submit" class="btn-danger btn btn-link">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
