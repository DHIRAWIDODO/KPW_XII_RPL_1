    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>@yield('title', 'Dashboard') | {{ config('app.name', 'AdminLTE') }}</title>

        <!--begin::Theme Init (prevents flash of incorrect theme on load)-->
        <script>
            (() => {
                'use strict';
                const root = document.documentElement;
                if (root.getAttribute('data-lte-color-mode') === 'off') return;
                const STORAGE_KEY = 'lte-theme';
                let stored = null;
                try { stored = localStorage.getItem(STORAGE_KEY); } catch {}
                const authored = root.getAttribute('data-bs-theme');
                let resolved = 'light';
                if (stored === 'dark' || stored === 'light') resolved = stored;
                else if (authored === 'dark' || authored === 'light') resolved = authored;
                else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) resolved = 'dark';
                root.setAttribute('data-bs-theme', resolved);
                root.style.colorScheme = resolved;
                if (resolved !== authored) root.setAttribute('data-lte-theme-resolved', '');
            })();
        </script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts & third party CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
            crossorigin="anonymous" media="print" onload="this.media = 'all'" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />

        <!-- AdminLTE -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" />

        <!-- apexcharts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />

        @stack('styles')
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div class="app-wrapper">

            @include('layouts.partials.header')
            @include('layouts.partials.sidebar')

            <!--begin::App Main-->
            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="mb-0 fs-3">@yield('page-title', 'Dashboard')</h1>
                            </div>
                            <div class="col-sm-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-sm-end">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                        @yield('breadcrumb')
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::App Content Header-->

                <!--begin::App Content-->
                <div class="app-content">
                    <div class="container-fluid">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @yield('content')

                    </div>
                </div>
                <!--end::App Content-->
            </main>
            <!--end::App Main-->

            @include('layouts.partials.footer')
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarWrapper = document.querySelector('.sidebar-wrapper');
                const isMobile = window.innerWidth <= 992;
                if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: { theme: 'os-theme-light', autoHide: 'leave', clickScroll: true },
                    });
                }
            });
        </script>

        @stack('scripts')
    </body>
    </html>
