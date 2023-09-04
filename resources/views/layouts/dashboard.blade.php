<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/datatables-bs5/css/datatables-bs5.css">
    <link rel="stylesheet" href="/assets/style.css">
    <script src="/assets/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/jquery/js/jquery.js"></script>
    <script src="/assets/datatables-bs5/js/datatables-bs5.js"></script>
    <style>
        .sidebar {
            min-height: 100dvh;
            width: 0;
            background-color: #011c36;
            overflow-x: hidden;
            transition: all 0.2s;
            z-index: 9991;
            position: fixed;
        }

        .sidebar-active {
            width: 350px !important;
        }

        .sidebar .sidebar-menu {
            margin-top: 4px;
        }

        .sidebar .sidebar-menu .sidebar-menu-item {
            color: #cbcbcb;
            cursor: pointer;
        }

        .sidebar .sidebar-menu .sidebar-menu-item:hover {
            color: #ffffff;
            background-color: #01162a;
        }

        .sidebar .sidebar-menu .sidebar-menu-item-active {
            color: #ffffff;
            background-color: #01162a;
        }

        @media (min-width: 1200px) {
            .sidebar {
                position: relative;
            }
        }
    </style>
    @yield('style')
    <title>{{ (isset($title) ? $title : 'Dashboard') . ' | Nikah Ceria' }}</title>
</head>

<body class="d-flex w-100 position-relative">
    <aside id="sidebar" class="sidebar">
        <div class="py-5" style="padding-left: 70px; padding-right: 70px;">
            <a href="/#">
                <img src="/images/logo-full-white.png" alt="logo" class="w-100">
            </a>
        </div>
        <ul class="d-flex flex-column sidebar-menu">
            <li class="sidebar-menu-item {{ Request::is('dashboard') ? 'sidebar-menu-item-active' : '' }}">
                <a href="/dashboard" class="py-3 px-5 d-flex column-gap-4 align-items-center" style="color: inherit;">
                    <i class="bi bi-speedometer2 fs-3"></i>
                    <span class="fw-bold">Dashboard</span>
                </a>
            </li>
            @can('act-as-admin')
                <li
                    class="sidebar-menu-item {{ Request::is('dashboard/customers', 'dashboard/customers/*') ? 'sidebar-menu-item-active' : '' }}">
                    <a href="/dashboard/customers" class="py-3 px-5 d-flex column-gap-4 align-items-center"
                        style="color: inherit;">
                        <i class="bi bi-people fs-3"></i>
                        <span class="fw-bold">Pengguna</span>
                    </a>
                </li>
                <li
                    class="sidebar-menu-item {{ Request::is('dashboard/products', 'dashboard/products/*') ? 'sidebar-menu-item-active' : '' }}">
                    <a href="/dashboard/products" class="py-3 px-5 d-flex column-gap-4 align-items-center"
                        style="color: inherit;">
                        <i class="bi bi-box fs-3"></i>
                        <span class="fw-bold">Produk</span>
                    </a>
                </li>
            @endcan
            <li
                class="sidebar-menu-item {{ Request::is('dashboard/invitations', 'dashboard/invitations/*') ? 'sidebar-menu-item-active' : '' }}">
                <a href="/dashboard/invitations" class="py-3 px-5 d-flex column-gap-4 align-items-center"
                    style="color: inherit;">
                    <i class="bi bi-envelope-paper fs-3"></i>
                    <span class="fw-bold">Undangan</span>
                </a>
            </li>
            <li
                class="sidebar-menu-item {{ Request::is('dashboard/orders', 'dashboard/orders/*') ? 'sidebar-menu-item-active' : '' }}">
                <a href="/dashboard/orders" class="py-3 px-5 d-flex column-gap-4 align-items-center"
                    style="color: inherit;">
                    <i class="bi bi-border-width fs-3"></i>
                    <span class="fw-bold">Orderan</span>
                </a>
            </li>
        </ul>
    </aside>
    <div id="sidebarOverlay" class="position-fixed d-xl-none w-100"
        style="top: 0; left-0; height: 100dvh; background-color: rgba(0, 0, 0, 0.5); z-index: 9990"
        onclick="toggleSidebar()"></div>
    <div class="w-100" style="flex: 1 1 0%; overflow-x: hidden">
        <header>
            <div class="container mx-auto d-flex w-100 py-2 align-items-center">
                <i class="bi bi-list fs-1 text-primary d-block d-xl-none me-3" style="cursor: pointer;"
                    onclick="toggleSidebar()"></i>
                <p class="fw-bold fs-3" style="margin-top: -2px; text-wrap: nowrap">{{ $title }},</p>
                <p class="fw-medium text-truncate"
                    style="margin-top: 5px; margin-left: 3px; color: #5c5c5c; font-size: 20px;">Halo
                    {{ strtok(auth()->user()->admin ? auth()->user()->admin->name : auth()->user()->customer->name, ' ') }}
                </p>
                <a href="/dashboard/logout" class="ms-auto">
                    <i class="bi bi-box-arrow-right fs-1 text-danger"></i>
                </a>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        const successMessage = "{{ session('successMessage') ? session('successMessage') : '' }}"
        const warningMessage = "{{ session('warningMessage') ? session('warningMessage') : '' }}"
        const errorMessage = "{{ session('errorMessage') ? session('errorMessage') : '' }}"
        const toast = $(".toast")
        const toastBody = $(".toast-body")
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast.get(0))
        const sidebar = $("#sidebar")
        const sidebarOverlay = $("#sidebarOverlay")
        sidebarOverlay.hide()

        if (successMessage) {
            toast.addClass('bg-success')
            toastBody.html(successMessage)
            toastBootstrap.show()
        }

        if (warningMessage) {
            toast.addClass('bg-warning')
            toastBody.html(warningMessage)
            toastBootstrap.show()
        }

        if (errorMessage) {
            toast.addClass('bg-danger')
            toastBody.html(errorMessage)
            toastBootstrap.show()
        }

        function toggleSidebar() {
            sidebar.toggleClass('sidebar-active')

            if (sidebar.hasClass('sidebar-active')) {
                sidebarOverlay.show()
            } else {
                sidebarOverlay.hide()
            }
        }

        if (document.body.clientWidth > 1200) {
            toggleSidebar()
        }
    </script>
    @yield('script')
</body>

</html>
