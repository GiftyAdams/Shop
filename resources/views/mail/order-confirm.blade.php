<div>
    <h1>Order Confirmation</h1>
    <p>Hello {{ $user->first_name }},</p>
    <section>
        <p>Thank you for your order! Your order <strong>#{{ $order->order_number }}</strong> has been confirmed.</p>

        <p>We will notify you once your order is shipped.</p>

        <p><strong>Order Summary:</strong></p>

        <ul>
            @foreach ($order->orderItems as $item)
                <li>{{ $item->product->name }} - {{ $item->quantity }} x ${{ $item->product->price }}</li>
            @endforeach
        </ul>

        <p>Total: <strong>${{ $order->total_price }}</strong></p>

        <p>Thank you for shopping with us!</p>
    </section>
</div>
