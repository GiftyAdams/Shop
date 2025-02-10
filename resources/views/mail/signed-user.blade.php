<x-header>Account Verification</x-header>
<p>Hi {{ $user->name }},</p>
<section>
    <p>To verify your account, please click the link below:</p>
    <a href="{{ route('verification.verify', ['id' => $user->id]) }}">Verify Account</a>
</section>