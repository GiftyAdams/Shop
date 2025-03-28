<div style="border: 1px solid #ddd; padding: 15px; font-family: Arial, sans-serif; background-color: #f8f8f8;">
    <h2 style="color: #d9534f;">Out of Stock Alert!</h2>
    <p>The product <strong>{{ $product->name }}</strong> is currently out of stock.</p>
    <p>Current Quantity: <strong>{{ $product->quantity }}</strong></p>
    <p>Please restock this product as soon as possible.</p>
    <br>
    <a href="{{ url('/admin/notifications/' . $product->id) }}" 
       style="background-color: #5bc0de; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
       View Product
    </a>
</div>
