<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>API Documentation</h1>
        <p>This page provides an overview of the available API endpoints in your Laravel application.</p>

        <h2>Authentication</h2>
        <ul>
            <li>
                <strong>Google Sign-In:</strong>
                <p>Endpoint: <code>GET /auth/google/redirect</code></p>
                <p>Description: Redirects the user to Google for authentication.</p>
            </li>
            <li>
                <strong>Google Callback:</strong>
                <p>Endpoint: <code>GET /auth/google/callback</code></p>
                <p>Description: Handles Google authentication and generates a token.</p>
            </li>
        </ul>

        <h2>Cart Management</h2>
        <ul>
            <li>
                <strong>Add to Cart:</strong>
                <p>Endpoint: <code>POST /cart</code></p>
                <p>Description: Adds a product to the cart.</p>
                <p>Parameters: <code>product_id</code>, <code>quantity</code>, <code>price</code>.</p>
            </li>
            <li>
                <strong>Update Cart Item:</strong>
                <p>Endpoint: <code>PUT /cart/{id}</code></p>
                <p>Description: Updates the quantity or price of an item in the cart.</p>
            </li>
            <li>
                <strong>Delete Cart Item:</strong>
                <p>Endpoint: <code>DELETE /cart/{id}</code></p>
                <p>Description: Removes an item from the cart.</p>
            </li>
        </ul>

        <h2>Checkout</h2>
        <ul>
            <li>
                <strong>Checkout:</strong>
                <p>Endpoint: <code>POST /checkout</code></p>
                <p>Description: Creates an order and clears the cart.</p>
                <p>Parameters: <code>shipping_address_id</code>.</p>
            </li>
        </ul>
    </div>
</body>
</html>
