<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->

            <!--begin::Color Mode Toggle-->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="bd-theme" aria-label="Toggle color scheme"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                    <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                    <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme" style="--bs-dropdown-min-width: 8rem">
                    <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"><i class="bi bi-sun-fill me-2"></i>Light</button></li>
                    <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"><i class="bi bi-moon-fill me-2"></i>Dark</button></li>
                    <li><button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"><i class="bi bi-circle-half me-2"></i>Auto</button></li>
                </ul>
            </li>
            <!--end::Color Mode Toggle-->

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <span class="rounded-circle shadow d-inline-flex align-items-center justify-content-center bg-primary text-white me-1"
                          style="width: 25px; height: 25px; font-size: 0.75rem; font-weight: 600;">
                        {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'G' }}
                    </span>
                    <span class="d-none d-md-inline">{{ auth()->check() ? auth()->user()->name : 'Guest' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary d-flex flex-column align-items-center py-3">
                        <span class="rounded-circle shadow d-inline-flex align-items-center justify-content-center bg-white text-primary fw-bold mb-2"
                              style="width: 90px; height: 90px; font-size: 2rem;">
                            {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'G' }}
                        </span>
                        <p class="mb-0">
                            {{ auth()->check() ? auth()->user()->name : 'Guest' }}
                            <br>
                            <small>{{ auth()->check() ? 'Member since '.auth()->user()->created_at->format('M. Y') : '' }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-outline-secondary">Profile</a>
                        @if(auth()->check() && Route::has('logout'))
                            <form method="POST" action="{{ route('logout') }}" class="float-end">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Sign out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-danger float-end">Sign in</a>
                        @endif
                    </li>
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
</nav>
<!--end::Header-->