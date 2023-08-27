<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('style')
    <title>{{ isset($title) ? $title . ' | NIkah Ceria' : 'Nikah Ceria - Buat Undangan Pernikahan Gratis' }}</title>
</head>

<body class="min-vh-100 d-flex flex-column">
    <header class="bg-white sticky-top">
        <div class="container position-relative">
            <div class="d-flex py-3 align-items-center">
                <i class="bi bi-list fs-2 text-primary cursor-pointer me-3 d-lg-none" data-bs-toggle="collapse"
                    data-bs-target="#menu" style="cursor: pointer;"></i>
                <a href="/#">
                    <img src="/images/logo-full.png" alt="logo" style="width: 155px;">
                </a>
                <a href="/login" class="btn btn-outline-primary ms-auto" style="--bs-color">Login</a>
            </div>
            <nav class="position-absolute d-none d-lg-block"
                style="top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);">
                <ul class="d-flex mt-3" style="column-gap: 36px">
                    <li>
                        <a href="/#"
                            class="text-decoration-none fw-medium link-dark link-primary-hover fw-medium">Home</a>
                    </li>
                    <li>
                        <a href="/#template"
                            class="text-decoration-none fw-medium link-dark link-primary-hover fw-medium">Template</a>
                    </li>
                    <li>
                        <a href="/#feature"
                            class="text-decoration-none fw-medium link-dark link-primary-hover fw-medium">Fitur</a>
                    </li>
                    <li>
                        <a href="/#contact"
                            class="text-decoration-none fw-medium link-dark link-primary-hover fw-medium">Kontak</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="collapse" id="menu" class="d-flex"
        style="background-color: #011c36; left:0; position: fixed; width: 100%; top: 70px;">
        <ul class="mx-auto text-center py-1 mt-2" style="width: max-content;">
            <li class="py-2">
                <a href="/#" class="text-decoration-none link-white-hover font-medium" style="color: #dbdbdb">
                    <p data-bs-toggle="collapse" data-bs-target="#menu">Home</p>
                </a>
            </li>
            <li class="list-group-item border-0 bg-transparent py-2">
                <a href="/#template" class="text-decoration-none link-white-hover font-medium" style="color: #dbdbdb">
                    <p data-bs-toggle="collapse" data-bs-target="#menu">Template</p>
                </a>
            </li>
            <li class="list-group-item border-0 bg-transparent py-2">
                <a href="/#feature" class="text-decoration-none link-white-hover font-medium" style="color: #dbdbdb">
                    <p data-bs-toggle="collapse" data-bs-target="#menu">Fitur</p>
                </a>
            </li>
            <li class="list-group-item border-0 bg-transparent py-2">
                <a href="/#contact" class="text-decoration-none link-white-hover font-medium" style="color: #dbdbdb">
                    <p data-bs-toggle="collapse" data-bs-target="#menu">Kontak</p>
                </a>
            </li>
        </ul>
    </div>
    <main class="h-100" style="flex: 1 1 0%">
        @yield('content')
    </main>
    <footer class="py-4" style="background-color: #011c36">
        <div class="container d-flex flex-column flex-lg-row column-gap-lg-5 row-gap-4 row-gap-lg-0 w-100 mx-auto">
            <div class="w-100">
                <a href="/#">
                    <img src="/images/logo-full-white.png" alt="logo" style="width: 155px;">
                </a>
                <p class="text-white mt-3 fs-5">Buat Undangan Pernikahan Gratis</p>
                <p style="color: #dbdbdb !important; font-size: 14px;">Buat undangan tanpa adanya
                    batasan.</p>
                <p style="color: #dbdbdb !important; font-size: 14px;">Explore ratusan template menarik.
                </p>
            </div>
            <div class="w-100">
                <p class="text-white fs-4 fw-bold">Links</p>
                <ul class="mt-1">
                    <li class="border-0 bg-transparent py-1">
                        <a href="/#" class="text-decoration-none link-white-hover" style="color: #dbdbdb">Home</a>
                    </li>
                    <li class="border-0 bg-transparent py-1">
                        <a href="/#template" class="text-decoration-none link-white-hover"
                            style="color: #dbdbdb">Template</a>
                    </li>
                    <li class="border-0 bg-transparent py-1">
                        <a href="/#feature" class="text-decoration-none link-white-hover"
                            style="color: #dbdbdb">Fitur</a>
                    </li>
                    <li class="border-0 bg-transparent py-1">
                        <a href="/#contact" class="text-decoration-none link-white-hover"
                            style="color: #dbdbdb">Kontak</a>
                    </li>
                </ul>
            </div>
            <div id="contact" class="w-100">
                <p class="text-white fs-4 fw-bold">Kontak</p>
                <p class="mt-2" style="font-size: 14px; color: #dbdbdb !important;">
                    <i class="bi bi-telephone text-white me-1"></i>
                    <span>(+62)822 9338 9523</span>
                </p>
                <p style="font-size: 14px; color: #dbdbdb !important;">
                    <i class="bi bi-envelope text-white me-1"></i>
                    <span>contact@nikahceria.com</span>
                </p>
            </div>
        </div>
    </footer>
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
    <script type="module">
        const successMessage = "{{ session('successMessage') ? session('successMessage') : '' }}"
        const warningMessage = "{{ session('warningMessage') ? session('warningMessage') : '' }}"
        const errorMessage = "{{ session('errorMessage') ? session('errorMessage') : '' }}"
        const toast = $(".toast")
        const toastBody = $(".toast-body")
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast.get(0))

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
    </script>
    @yield('script')
</body>

</html>
