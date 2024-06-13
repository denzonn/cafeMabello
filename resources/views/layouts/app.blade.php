<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

    <title>
        @yield('title')
    </title>

</head>

<body class="bg-secondary">
    <div class="fixed top-0 left-10 w-[20vw] h-screen pt-10 pb-16">
        <div class="bg-white w-full h-full rounded-lg px-8 py-6">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="relative top-0 left-[25vw] py-10 min-h-screen w-[72vw]">
        @yield('content')
    </div>

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')

</body>

</html>
