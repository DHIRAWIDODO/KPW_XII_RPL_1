<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sidebar Mini')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    {{-- ============ NAVBAR (HEADER) ============ --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    {{-- ============ /NAVBAR ============ --}}

    {{-- ============ SIDEBAR ============ --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text font-weight-light">Sidebar Mini</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sidebar-mini') }}" class="nav-link {{ request()->routeIs('sidebar-mini') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-compress"></i>
                            <p>Sidebar Mini</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    {{-- ============ /SIDEBAR ============ --}}

    {{-- ============ CONTENT WRAPPER ============ --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title', 'Sidebar Mini')</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p class="mb-0">
                            Ini halaman contoh untuk layout <strong>Sidebar Mini</strong>.
                            Scroll ke bawah untuk lihat perilaku sidebar/header/footer-nya.
                        </p>
                        <div style="height: 900px;"></div>
                        <p class="mb-0">Konten bawah — cek apakah header/sidebar ikut scroll atau tetap diam.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- ============ /CONTENT WRAPPER ============ --}}

    {{-- ============ FOOTER ============ --}}
    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }}</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Layout</b> Sidebar Mini
        </div>
    </footer>
    {{-- ============ /FOOTER ============ --}}

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('js')
</body>
</html>