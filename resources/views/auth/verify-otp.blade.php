<x-layout>
    @if (session('success'))
        <div id="success-message"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 text-center rounded relative"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById("success-message");
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 5000);
            }
        })
    </script>

    <main class="h-screen flex">
        <!-- Left Section: Image -->
        <div class="w-3/5 h-screen bg-cover bg-center">
            <img src="{{ Vite::asset('public/images/login-image.jpg') }}" alt=""
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section: Form -->
        <div class="w-2/5 flex items-center justify-center">
            <div class="w-full max-w-md p-8">
                <div class="py-8">
                    <button class="center text-[12px]" onclick="window.history.back();">
                        <x-svg.chevron-left /> Back
                    </button>
                </div>
                <div class="mb-4 center justify-center">
                    <ul class="space-y-1">
                        <li class=" font-bold text-2xl">
                            Enter OTP
                        </li>
                        <li class="text-xs text-subHeader w-80">
                            We have shared a code to your registered email address
                        </li>
                    </ul>
                </div>
                <form method="POST" action="/verify-otp">
                    @csrf

                    <div id="otp-form">
                        <div class="flex space-x-2">
                            <input type="text" id="otp1" name="otp1"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                            <input type="text" id="otp1" name="otp2"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                            <input type="text" id="otp1" name="otp3"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                            <input type="text" id="otp1" name="otp4"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                            <input type="text" id="otp1" name="otp5"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                            <input type="text" id="otp1" name="otp6"
                                class="otp-input w-12 h-12 border text-center rounded" maxlength="1"
                                inputmode="numeric" pattern="[0-9]" required>
                        </div>
                        <x-form-error name="otp" />
                        <x-form-button type="submit" class="mt-4 text-white  w-80">Verify OTP</x-form-button>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const inputs = document.querySelectorAll(".otp-input");

                            inputs.forEach((input, index) => {
                                input.addEventListener("input", (e) => {
                                    input.value = e.target.value.replace(/[^0-9]/g, ""); // Allow only numbers

                                    if (input.value && index < inputs.length - 1) {
                                        inputs[index + 1].focus(); // Move to next input
                                    }
                                });

                                input.addEventListener("keydown", (e) => {
                                    if (e.key === "Backspace" && !input.value && index > 0) {
                                        inputs[index - 1].focus(); // Move to previous input on backspace
                                    }
                                });
                            });

                            document.getElementById("otp-form").addEventListener("submit", function(e) {
                                e.preventDefault(); // Prevent default form submission

                                let otpCode = "";
                                inputs.forEach(input => {
                                    otpCode += input.value;
                                });

                                if (otpCode.length === 6) {
                                    alert("OTP Entered: " + otpCode);
                                    // You can send otpCode via AJAX or form submission here
                                } else {
                                    alert("Please enter all 6 digits.");
                                }
                            });
                        });
                    </script>
                </form>
            </div>

        </div>
        </div>

        </div>
    </main>
</x-layout>
