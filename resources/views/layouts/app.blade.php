<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Anime Police')</title>
    <link rel="stylesheet" href="{{ asset('STYLERSZ/dist/css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e1e1e;
        }
        /* Navbar styles */
        .navbar {
            background: linear-gradient(90deg, #ff007f, #590fb7);
            padding: 15px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }
        .navbar-brand {
            font-size: 1.8em;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 3px 10px rgba(255, 255, 255, 0.2);
        }
        .navbar-nav .nav-link {
            color: #fff;
            margin-right: 20px;
            font-size: 1.1em;
            font-weight: bold;
            text-transform: uppercase;
        }
        /* Other styles you want to keep consistent */
        .container {
            margin-top: 50px;
        }
        /* Add other styles from shop.blade.php here */
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/shop">Anime Club</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('seller.panel') }}">Seller Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('purchase.history') }}">Purchase History</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-neon" href="{{ route('cart.view') }}">View Cart</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('STYLERSZ/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
