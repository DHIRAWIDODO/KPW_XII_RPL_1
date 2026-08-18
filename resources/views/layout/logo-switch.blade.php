<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sidebar Mini + Logo Switch')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <style>
        /* Saat sidebar EXPANDED: tampilkan logo penuh, sembunyikan logo mini */
        .brand-link .brand-image-mini { display: none; }
        .brand-link .brand-image-full { display: inline-block; }

        /* Saat sidebar COLLAPSED (mini): tampilkan logo mini, sembunyikan logo penuh */
        body.sidebar-collapse .brand-link .brand-image-mini { display: inline-block; }
        body.sidebar-collapse .brand-link .brand-image-full { display: none; }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" class="brand-link">
            <img src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/img/AdminLTELogo.png"
                 class="brand-image-mini img-circle elevation-3" style="opacity: .8; max-height: 33px;" alt="Logo Mini">
            <span class="brand-image-full">
                <img src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/img/AdminLTELogo.png"
                     class="brand-image img-circle elevation-3" style="opacity: .8" alt="Logo">
                <span class="brand-text font-weight-light">Logo Switch</span>
            </span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('logo-switch') }}" class="nav-link {{ request()->routeIs('logo-switch') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sync-alt"></i>
                            <p>Logo Switch</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">@yield('title', 'Sidebar Mini + Logo Switch')</h1>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p class="mb-0">Coba klik ikon <i class="fas fa-bars"></i> di navbar untuk toggle sidebar, lalu perhatikan logo di pojok kiri atas berubah.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }}</strong> All rights reserved.
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('js')
</body>
</html>