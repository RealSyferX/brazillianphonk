<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Police</title>
    <link rel="stylesheet" href="./STYLERSZ/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e1e1e;
        }

        /* Cool Navbar Styles */
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
            position: relative;
            font-size: 1.1em;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        /* Glowing hover effect */
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -3px;
            left: 0;
            background-color: #ffcc00;
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::before {
            width: 100%;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.7);
        }

        /* Neon button */
        .btn-neon {
            background-color: #ffcc00;
            color: #1e1e1e;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.1em;
            text-transform: uppercase;
            box-shadow: 0 0 10px #ffcc00, 0 0 20px #ffcc00;
            transition: all 0.3s ease;
        }

        .btn-neon:hover {
            background-color: #fff;
            box-shadow: 0 0 20px #fff, 0 0 30px #ffcc00;
        }

        .container {
            margin-top: 50px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            width: 200px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .product:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        h2 {
            font-size: 1.2em;
            color: #333;
            margin: 10px 0;
        }

        p {
            margin: 5px 0;
            color: #666;
        }

        form {
            margin-top: 10px;
        }

        input[type="number"] {
            width: 50px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/shop">Anime Club</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

<div class="container"style="color: #f4f4f4">
    <div class="checkout-header">
        <h1>Checkout</h1>
    </div>

    <!-- Product List -->
    <div class="product-list">
        @foreach ($cartItems as $item)
            <div class="product-item">
                <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                <span style="color: blue">RM {{ number_format($item->product->price * $item->quantity, 2) }}</span>
            </div>
        @endforeach
    </div>

    <!-- Total Amount -->
    <div class="total" style="color: red">
        Total: RM {{ number_format($total, 2) }}
    </div>

    <!-- Checkout Button -->
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn-checkout">Proceed to Checkout</button>
    </form>
</div>

<script src="./STYLERSZ/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
