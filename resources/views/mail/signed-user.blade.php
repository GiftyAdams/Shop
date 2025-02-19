<div class="text-white border border-gray-300 p-4">
    <h1>Account Verification</h1>
    <p>Hi {{ $user->name }},</p>
    <section>
        <p>To verify your account, please click the link below:</p>
        <a href="{{ route('verification.verify', ['id' => $user->id]) }}"
            class="border border-gray-400 text-white p-2">Verify Account</a>
    </section>
</div>
