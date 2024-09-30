<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./STYLERSZ/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .register-container {
            max-width: 400px; /* Set max width for the form */
            margin: 100px auto; /* Center the form vertically and horizontally */
            padding: 20px; /* Add padding */
            background-color: white; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .register-header {
            text-align: center; /* Center the header */
            margin-bottom: 20px; /* Space below the header */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-header">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Your Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Re-enter Your Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Already Have an Account?</a>
            </div>
        </form>
    </div>

    <script src="./STYLERSZ/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
