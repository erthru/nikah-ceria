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
    @yield('style')
    <title>{{ (isset($title) ? $title : 'Dashboard') . ' | Nikah Ceria' }}</title>
</head>

<body>
    <main>
        @yield('content')
    </main>
    @yield('script')
</body>

</html>
