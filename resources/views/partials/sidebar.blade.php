<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('admin/admin') || request()->is('admin/admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('admin') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('User Management') }}</span>
                </a>
                {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
                    </div>
                </div> --}}
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Customers') }}</a>
                         <a class="collapse-item {{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Admins') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Booking') }}</span>
                </a>
                <div id="collapseRoom" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/slots') || request()->is('admin/slots/*') ? 'active' : '' }}" href="{{ route('admin.slots.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('slots') }}</a>
                     </div>
                </div>
            </li>


        </ul>
