<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand text-center m-0" href="#!">

        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <div
                        class="icon icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <i class="fa fa-home"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.students.index') }}"
                    class="nav-link {{ request()->routeIs('admin.students.index') || request()->routeIs('admin.students.create') || request()->routeIs('admin.students.store') ? 'active' : '' }}">
                    <div
                        class="icon icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Student</span>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.subjects.index') }}"
                    class="nav-link {{ request()->routeIs('admin.subjects.index') || request()->routeIs('admin.subjects.create') || request()->routeIs('admin.subjects.store') ? 'active' : '' }}">
                    <div
                        class="icon icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Subject</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
