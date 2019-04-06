<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('_partials.admin.nav')
    <div class="container-fluid">
        <div class="row">
            @include('_partials.admin.sidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
                @yield('content')
            </main>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>
