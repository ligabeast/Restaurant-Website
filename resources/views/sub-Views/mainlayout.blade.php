<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
            href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('/css/mainlayout.css')}}"/>
    <title>Mensa</title>

</head>
<header class="navbar navbar-dark bg-dark navbar-expand-md ml-auto fixed-top p-3">
    <div class="container">
        <a href="/" class="navbar-brand">Restaurant Logo</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            @yield('navigation-bar')
        </div>
    </div>
</header>
<body>
<div class="container-fluid" style="margin-bottom: 20%;">
    <div class="row mt-5">
        <div class="col-3 fixed-left mt-5">
            <nav class="navbar navbar-light bg-light border border-dark text-center left_bar">
                <ul class="navbar-nav ms-auto w-100">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a href="/" style="cursor : pointer;" class="nav-link left_bar_items">Hauptseite</a>
                        </li>
                        @if(\App\Models\User::whereId(Auth::id())->first()->admin)
                            <li class="nav-item">
                                <a href="/adminbereich" style="cursor : pointer;" class="nav-link left_bar_items">Adminbereich</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/bewertungen" style="cursor : pointer;"
                               class="nav-link left_bar_items">Bewertungen</a>
                        </li>
                        <li class="nav-item">
                            <a href="/mein_konto" style="cursor : pointer;" class="nav-link left_bar_items">Mein
                                Konto</a>
                        </li>
                        <li class="nav-item">
                            <a href="/abmeldung" style="cursor : pointer;" class="nav-link left_bar_items">Abmelden</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a style="cursor : pointer;" data-bs-toggle="modal" data-bs-target="#login"
                               class="nav-link left_bar_items">Anmelden</a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor : pointer;" data-bs-toggle="modal" data-bs-target="#register"
                               class="nav-link left_bar_items">Registrieren</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="col" id="release">
            @yield('one')
            @yield('two')
            @yield('three')
            @yield('four')
            @yield('five')
            @yield('six')
            @yield('seven')
        </div>
    </div>
</div>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous">
</script>
</body>
<footer class="bg-dark text-center text-white" style="height: 30%" ;>
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1"
               href="https://www.linkedin.com/in/baran-%C3%B6zbey-780875238/" role="button"
            ><i class="fab fa-linkedin-in bi-linkedin"></i
                ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/ligabeast" role="button"
            ><i class="fab fa-github bi-github"></i
                ></a>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="/">Baran Özbey</a>
    </div>
</footer>

</html>
