@extends('layouts.app', ['activePage' => 'Employees', 'titlePage' => __('Employees')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Employees') }}</h4>
                            <p class="card-category"> Here you can manage employees</p>

                        </div>
                        <div class="card-body">
                            <div class="row float-right">
                                <form action="{{ route('admin.employees.index') }}">
                                    <div class="input-group no-border">
                                        <input class="form-control" type="text" name="q" placeholder="Search..."
                                        value="{{ request()->query('q', '') }}">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <a href="{{ route('admin.employees.create') }}" class="btn btn-sm btn-primary">New
                                        employee</a>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Name
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                        <i class="fa fa-arrow-up"></i>
                                                        <i class="fa fa-arrow-down text-muted"></i>
                                                </span>
                                            </th>
                                            <th>
                                                Job Title
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <i class="fa fa-arrow-down text-muted"></i>
                                            </span>
                                            </th>
                                            <th>
                                                Phone
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <i class="fa fa-arrow-down text-muted"></i>
                                            </span>
                                            </th>
                                            <th>
                                                Country
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <i class="fa fa-arrow-down text-muted"></i>
                                            </span>
                                            </th>
                                            <th>
                                                National ID
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <i class="fa fa-arrow-down text-muted"></i>
                                            </span>
                                            </th>
                                            <th>
                                                Salary
                                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <i class="fa fa-arrow-down text-muted"></i>
                                            </span>
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>
                                                    <a
                                                    href="{{ route('admin.employees.show', $employee) }}">{{ $employee->name }}</a>
                                                </td>
                                                <td>
                                                    {{ $employee->job_title}}
                                                </td>
                                                <td>
                                                    {{ $employee->phone }}
                                                </td>
                                                <td>
                                                    {{ $employee->country }}
                                                </td>
                                                <td>
                                                    {{ $employee->national_id }}
                                                </td>
                                                <td>
                                                    {{ $employee->salary }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{ route('admin.employees.destroy', $employee) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link"
                                                            href="{{ route('admin.employees.edit', $employee) }}"
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto">
                                    {{ $employees->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
