<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <livewire:styles />
    <title>Cafe Helper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .container {
            width: auto;
            max-width: 1000px;
            padding: 0 15px;
        }

        .brd {
            border: 4px double black; /* Параметры границы */
            background: #E0FFFF; /* Цвет фона */
            padding: 10px; /* Поля вокруг текста */
        }

        .whole-background
        {
            position:fixed;
            padding:0;
            margin:0;

            top:0;
            left:0;

            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="/"
               class="{{ request()->is('/') ? 'btn btn-success' : 'btn btn-light' }}">
                Home
            </a>
        </div>
        <div class="container">
            <a href="/products" class="{{ request()->is('products') ? 'btn btn-success' : 'btn btn-light' }}">
                Products
            </a>
        </div>
        <div class="container">
            <a href="/realizations" class="{{ request()->is('realizations') ? 'btn btn-success' : 'btn btn-light' }}">
                Realizations
            </a>
        </div>
        <div class="container">
            <a href="/purchases" class="{{ request()->is('purchases') ? 'btn btn-success' : 'btn btn-light' }}">
                Purchases
            </a>
        </div>
        {{--        <div class="container">--}}
        {{--            <a href="/create/realization" class="btn btn-primary">--}}
        {{--                New realization--}}
        {{--            </a>--}}
        {{--        </div>--}}
        <div class="container">
            <a href="/purchases/create" class="{{ request()->is('purchases/create') ? 'btn btn-success' : 'btn btn-primary' }}">
                New purchase
            </a>
        </div>
        <div class="container">
            <a href="/import" class="{{ request()->is('import') ? 'btn btn-success' : 'btn btn-info' }}">
                Import
            </a>
        </div>
        <div class="container">
            <a href="/export" class="{{ request()->is('export') ? 'btn btn-success' : 'btn btn-info' }}">
                Export
            </a>
        </div>
        <div class="container">
            <a href="/logout" class="btn btn-danger">
                Log Out
            </a>
        </div>
    </div>
</header>
<main class="flex-shrink-0">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</main>


<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Cafe-helper 2021</span>
    </div>
</footer>
<livewire:scripts />
</body>
</html>

