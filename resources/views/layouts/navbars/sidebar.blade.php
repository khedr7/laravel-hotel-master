<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <div class="simple-text logo-normal">
            {{ __('Laravel Hotel') }}
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item{{ $activePage == 'Reservations' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.reservations.index') }}">
                    <i class="material-icons">book</i>
                    <p>{{ __('Reservations') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Transactions' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.transactions.index') }}">
                    <i class="material-icons">money</i>
                    <p>{{ __('Transactions') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'my-profile' || $activePage == 'All-staffs' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#staffs"
                    aria-expanded="{{ $activePage == 'my-profile' || $activePage == 'All-staffs' ? 'true' : 'false' }}">
                    <i><i class="material-icons">persons</i></i>
                    <p>{{ __('Staff') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'my-profile' || $activePage == 'All-staffs' ? 'show' : '' }}"
                    id="staffs">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                        <li class="nav-item{{ $activePage == 'my-profile' ? ' active' : '' }} ">
                            <a class="nav-link" href="{{ route('admin.profile.edit') }}">
                                <i class="material-icons">account_circle</i>
                                <p>{{ __('my profile ') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'All-staffs' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <i class="material-icons">manage_accounts</i>
                                <p>{{ __('Staffs Management ') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'Employees' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.employees.index') }}">
                    <i class="material-icons">persons</i>
                    <p>{{ __('Employees') }} </p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'roomTypes' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.room-types.index') }}">
                    <i class="material-icons">maps_home_work</i>
                    <p>{{ __('Room Types') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'rooms' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.rooms.index') }}">
                    <i class="material-icons">bedroom_parent</i>
                    <p>{{ __('Rooms') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'review' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                    <i class="material-icons">stars</i>
                    <p>{{ __('Review') }}</p>
                </a>
            </li>
            <li
                class="nav-item {{ $activePage == 'room-services' || $activePage == 'create-room-service' ? ' active' : '' }}">
                <a class="nav-link " data-toggle="collapse" href="#room-services"
                    aria-expanded="{{ $activePage == 'room-services' || $activePage == 'create-room-service' ? 'true' : 'false' }}">
                    <i class="material-icons">live_help</i>
                    <p>Room Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'room-services' || $activePage == 'create-room-service' ? 'show' : '' }}"
                    id="room-services">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'room-services' ? ' active' : '' }} ">
                            <a class="nav-link" href="{{ route('admin.room-services.index') }}">
                                <i class="material-icons"> live_help</i>
                                <span class="sidebar-normal">all services</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'create-room-service' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.room-services.create') }}">
                                <i class="material-icons"> add </i>
                                <span class="sidebar-normal"> new service </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'room-service-requests' || $activePage == 'create-room-service-requests' ? ' active' : '' }}">
                <a class="nav-link " data-toggle="collapse" href="#room-service-requests"
                    aria-expanded="{{ $activePage == 'room-service-requests' || $activePage == 'create-room-service-requests' ? 'true' : 'false' }}">
                    <i class="material-icons">live_help</i>
                    <p>Room Service Requests
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'room-service-requests' || $activePage == 'create-room-service-requests' ? 'show' : '' }}"
                    id="room-service-requests">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'room-service-requests' ? ' active' : '' }} ">
                            <a class="nav-link" href="{{ route('admin.room-service-requests.index') }}">
                                <i class="material-icons"> live_help</i>
                                <span class="sidebar-normal">all requests</span>
                            </a>
                        </li>
                        @can('create room services requests')
                            <li class="nav-item {{ $activePage == 'create-room-service-requests' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.room-service-requests.create') }}">
                                    <i class="material-icons"> add </i>
                                    <span class="sidebar-normal"> new request </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'offers' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.offers.index') }}">
                    <i class="material-icons">percent</i>
                    <p>{{ __('offers') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'messages' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.messages.index') }}">
                    <i class="material-icons">message</i>
                    <p>{{ __('messages') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'customers' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.customers.index') }}">
                    <i class="material-icons">persons</i>
                    <p>{{ __('Customers') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'setting' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="material-icons">settings</i>
                    <p>{{ __('settings') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
