<div class="border border-gray-300 text-white rounded-md p-4 mt-4">
    <h1>Email OTP Verification</h1>
    <p>Below is your one time passcode that you need to complete your authentication. The verification code wil be valid
        for 10 minutes. Please do not share this code with anyone.</p>
    <div class="font-medium">
        {{ $otp }}
    </div>
    <div class="space-y-2 mt-2">
        <p>Thank you for using our service.</p>
        <p>If you did not request this email, please ignore it.</p>
    </div>
</div>
