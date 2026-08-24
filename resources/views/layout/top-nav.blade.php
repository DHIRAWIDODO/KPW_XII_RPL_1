<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Top Nav + No Sidebar')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    @stack('css')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    {{-- ============ NAVBAR (SEKALIGUS BERISI MENU) ============ --}}
    <nav class="main-header navbar navbar-expand-md navbar-white navbar-light">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="brand-text font-weight-light">Top Nav</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('top-nav') }}" class="nav-link {{ request()->routeIs('top-nav') ? 'active' : '' }}">Top Nav Demo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- ============ /NAVBAR ============ --}}

    {{-- ============ CONTENT WRAPPER (TANPA SIDEBAR) ============ --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <h1 class="m-0">@yield('title', 'Top Nav + No Sidebar')</h1>
            </div>
        </div>
        <section class="content">
            <div class="container">
                @yield('content')
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p class="mb-0">Layout ini tidak punya elemen &lt;aside class="main-sidebar"&gt; sama sekali — semua navigasi ada di navbar atas.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- ============ /CONTENT WRAPPER ============ --}}

    {{-- ============ FOOTER ============ --}}
    <footer class="main-footer">
        <div class="container">
            <strong>&copy; {{ date('Y') }}</strong> All rights reserved.
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