<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    {{-- DTATATABLE --}}
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.3/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.3/datatables.min.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
         {{-- HEADER --}}
        @include('partials.header')

        {{-- SIDEBAR --}}
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 bg-blue navbar-dark d-flex flex-column justify-content-between lateral-sidebar">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column pt-5">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-violet rounded-2' : '' }}"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
                            </li>
                            <li class="nav-item my-2">
                                <a href="{{ route('admin.projects.index') }}" class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-violet rounded-2' : '' }}"><i class="fa-solid fa-newspaper"></i> Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.types.index') }}" class="nav-link text-white {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-violet rounded-2' : '' }}"><i class="fa-solid fa-folder"></i> Types</a>
                            </li>
                            <li class="nav-item my-2">
                                <a href="{{ route('admin.technologies.index') }}" class="nav-link text-white tech {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg-violet rounded-2' : '' }}"><i class="fa-solid fa-microchip fs-5"></i> Technologies</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-bottom text-white"><i class="fa-solid fa-headset"></i> Support</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://127.0.0.1:8000/profile" class="nav-link nav-bottom text-white"><i class="fa-solid fa-gear"></i> Settings</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- MAIN --}}+
                <div id="content">
                    <main class="col-md-9 ms-sm-auto col-lg-10 pt-3">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
