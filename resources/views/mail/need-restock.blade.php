<div>
    <div class="border border-gray-300 text-white rounded-md p-4 mt-4">
        <h1>Restock Alert!</h1>
        <p>The product <strong>{{ $product->name }}</strong> is running low on stock.</p>
        <p>Current Quantity: <strong>{{ $product->quantity }}</strong></p>
        <p>It is recommended to restock this product as soon as possible.</p>
        <br>
        <a href="{{ url('/admin/notifications/' . $product->id) }}"
            style="background-color: #5bc0de; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
            View Product
        </a>
    </div>
</div>
