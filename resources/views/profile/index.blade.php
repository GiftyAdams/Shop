<x-auth-layout>
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
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4 ">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-2">
                <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <x-form-field>
                            <x-form-label for="first_name">First Name</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="first_name" id="first_name" readonly
                                    value="{{ Auth::user()->first_name }}" />

                                <x-form-error name="first_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="last_name">Last Name</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="last_name" id="last_name" readonly
                                    value="{{ Auth::user()->last_name }}" />

                                <x-form-error name="last_name" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="phone_number">Phone Number</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="phone_number" placeholder="eg. 054 123 456"
                                    id="phone_number" readonly value="{{ Auth::user()->phone_number }}" />

                                <x-form-error name="phone_number" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="email" id="email" type="email"
                                    readonly value="{{ Auth::user()->email }}" />

                                <x-form-error name="email" />
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <x-form-label for="address">Address</x-form-label>

                            <div>
                                <x-form-input class="py-3 editable" name="address" id="address" placeholder="Address"
                                    readonly value="{{ Auth::user()->address }}" />

                                <x-form-error name="address" />
                            </div>
                        </x-form-field>

                    </div>
                    <div class="grid justify-end p-6 center space-x-4">
                        <x-form-field>
                            <x-form-button class="w-24 justify-items-end" id="edit-button"
                                type="button">Edit</x-form-button>
                        </x-form-field>
                        <x-form-field>
                            <x-form-button class="w-24 justify-items-end" id="save-button"
                                type="submit">Save</x-form-button>
                        </x-form-field>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.getElementById('edit-button').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent page reload
                document.querySelectorAll('.editable').forEach((input) => {
                    input.removeAttribute('readonly');
                });
                document.getElementById('edit-button').style.display = 'none';
                document.getElementById('save-button').style.display = 'inline';
            });
        </script>
    </main>

</x-auth-layout>
