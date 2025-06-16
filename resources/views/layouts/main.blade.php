<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "websitepnp")</title>
    <style>

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href='/css/bootstrap.min.css'>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

    <body class="d-flex flex-column h-100">
        @include('layouts/header')
            <main class="flex-shrink-0">
                <div class="container">
                        @yield('content')
                    </div>
                </main>
            @include('layouts/footer')
        <script src="/js/bootstrap.bundle.min.js"></script>
    </body>

</html>