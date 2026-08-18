<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Layout + Custom Area')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    @stack('css')
</head>
<body class="hold-transition sidebar-mini control-sidebar-slide-open">
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

        <!-- Tombol buka/tutup Custom Area di kanan -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    {{-- ============ /NAVBAR ============ --}}

    {{-- ============ SIDEBAR UTAMA ============ --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text font-weight-light">Custom Area</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                       <a href="{{ route('layout-custom-area') }}" class="nav-link {{ request()->routeIs('layout-custom-area') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-large"></i>
                            <p>Layout + Custom Area</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    {{-- ============ /SIDEBAR UTAMA ============ --}}

    {{-- ============ CONTENT WRAPPER ============ --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">@yield('title', 'Layout + Custom Area')</h1>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p class="mb-0">
                            Klik ikon <i class="fas fa-th-large"></i> di navbar kanan atas untuk
                            membuka/menutup <strong>Custom Area</strong> (panel kanan).
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- ============ /CONTENT WRAPPER ============ --}}

    {{-- ============ CUSTOM AREA (CONTROL SIDEBAR KANAN) ============ --}}
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Custom Area</h5>
            <p>Ini adalah area tambahan di luar layout standar. Bisa diisi bebas: setting, filter, log aktivitas, dsb.</p>
            @yield('custom-area')
        </div>
    </aside>
    {{-- ============ /CUSTOM AREA ============ --}}

    {{-- ============ FOOTER ============ --}}
    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }}</strong> All rights reserved.
    </footer>
    {{-- ============ /FOOTER ============ --}}

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('js')
</body>
</html>