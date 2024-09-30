<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./STYLERSZ/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .login-container {
            max-width: 400px; /* Set max width for the form */
            margin: 100px auto; /* Center the form vertically and horizontally */
            padding: 20px; /* Add padding */
            background-color: white; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .login-header {
            text-align: center; /* Center the header */
            margin-bottom: 20px; /* Space below the header */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-header">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Cute Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Bank Password Hehe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">Don't have an account?</a>
            </div>
        </form>
    </div>

    <script src="./STYLERSZ/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
