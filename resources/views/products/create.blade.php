<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="./STYLERSZ/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .product-container {
            max-width: 500px; /* Set max width for the form */
            margin: 100px auto; /* Center the form vertically and horizontally */
            padding: 20px; /* Add padding */
            background-color: white; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .product-header {
            text-align: center; /* Center the header */
            margin-bottom: 20px; /* Space below the header */
        }
    </style>
</head>
<body>
    <div class="product-container">
        <h1 class="product-header">Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control"  max="999999999"id="price" name="price" placeholder="Price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" max="999999999" id="quantity" name="quantity" placeholder="Quantity" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Product</button>
        </form>
    </div>

    <script src="./STYLERSZ/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
