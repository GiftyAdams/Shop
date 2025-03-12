<x-auth-layout>
    <main class="px-20 py-8">
        <div>
            <x-header>Payment Method</x-header>
        </div>
        <div>
            <span>
                Select a payment method
            </span>
        </div>
        <form action="{{ route('cart.review') }}" method="GET">
            <div class="p-2">
                <div class="radio">
                    <input type="radio" name="payment" id="GooglePay" value="Google Pay">
                    <label for="GooglePay">Google Pay</label>
                </div>
                <div class="radio">
                    <input type="radio" name="payment" id="Paystack" value="Paystack">
                    <label for="Paystack">Paystack</label>
                </div>
                <div class="radio">
                    <input type="radio" name="payment" id="Cod" value="Cash on Delivery">
                    <label for="Cod">Cash on Delivery</label>
                </div>
            </div>

            <x-form-field>
                <x-form-button id="done-btn" class="w-80 opacity-50 cursor-not-allowed" type="submit" disabled>
                    Done
                </x-form-button>
            </x-form-field>
        </form>


        <!-- JavaScript -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const paymentRadios = document.querySelectorAll('input[name="payment"]');
                const doneButton = document.getElementById("done-btn");

                paymentRadios.forEach(radio => {
                    radio.addEventListener("change", function() {
                        doneButton.disabled = false;
                        doneButton.classList.remove("opacity-50", "cursor-not-allowed");
                    });
                });
            });
        </script>

    </main>
</x-auth-layout>
