<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Layout RTL')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <style>
        body[dir="rtl"] { text-align: right; }
        body[dir="rtl"] .main-sidebar { right: 0; left: auto; }
        body[dir="rtl"] .content-wrapper,
        body[dir="rtl"] .main-footer,
        body[dir="rtl"] .main-header { margin-right: 250px; margin-left: 0; }
        body[dir="rtl"].sidebar-collapse .content-wrapper,
        body[dir="rtl"].sidebar-collapse .main-footer,
        body[dir="rtl"].sidebar-collapse .main-header { margin-right: 4.6rem; }
        body[dir="rtl"] .nav-sidebar .nav-link p { text-align: right; }
        body[dir="rtl"] .navbar-nav { padding-right: 0; }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini" dir="rtl">
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
                <a href="{{ url('/') }}" class="nav-link">الرئيسية</a>
            </li>
        </ul>
    </nav>
    {{-- ============ /NAVBAR ============ --}}

    {{-- ============ SIDEBAR (otomatis pindah ke kanan via RTL css) ============ --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text font-weight-light">Layout RTL</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('layout-rtl') }}" class="nav-link {{ request()->routeIs('layout-rtl') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>لوحة التحكم</p>
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
                <h1 class="m-0">@yield('title', 'Layout RTL')</h1>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p class="mb-0">هذا مثال على تخطيط من اليمين إلى اليسار (RTL). لاحظ أن الشريط الجانبي انتقل إلى اليمين.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- ============ /CONTENT WRAPPER ============ --}}

    {{-- ============ FOOTER ============ --}}
    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }}</strong> جميع الحقوق محفوظة.
    </footer>
    {{-- ============ /FOOTER ============ --}}

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('js')
</body>
</html>