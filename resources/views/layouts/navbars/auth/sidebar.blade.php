<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">{{ config('app.name'), 'Web App' }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{--
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">D
                        
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            --}}

            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'task-list' ? 'active' : '' }}"
                    href="{{ route('task-list') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">Ta
                        
                    </div>
                    <span class="nav-link-text ms-1">Task List</span>
                </a>
            </li>
            @if(!auth()->user()->is_guest)
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'unit-list' ? 'active' : '' }}"
                    href="{{ route('unit-list') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">Un
                        
                    </div>
                    <span class="nav-link-text ms-1">Units</span>
                </a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'users' ? 'active' : '' }}"
                    href="{{ route('users') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">Us
                        
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            @endif
            @endif
        </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-3 pt-3">
    </div>
</aside>
