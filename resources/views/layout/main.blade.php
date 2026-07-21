<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand active" aria-current="page" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                        <a class="nav-link" href="/">Eventos</a>
                        <a class="nav-link" href="/events/create">Criar Eventos</a>
                        <a class="nav-link" href="/getAulas">Aulas</a>
                        <a class="nav-link" href="/createAula">Criar Aulas</a>

                        @if(!Auth::check())
                            <a href="/login" class="nav-link">Login</a>
                        @else
                            <form action="{{ route('logout.api') }}" method="POST">
                                @csrf
                                <input type="submit" class="nav-link" value="Logout">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="position-relative w-100 h-100 d-flex flex-column align-items-center justify-content-center gap-4 p-5">

        @yield('content')

        @if(session('msg'))
            <p class="msg position-fixed top-0 end-0 m-3 d-flex bg-secondary text-white p-2 ">{{ session('msg') }}</p>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>