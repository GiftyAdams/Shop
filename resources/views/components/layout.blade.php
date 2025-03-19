<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping website</title>
    @vite('resources/css/app.css')
</head>

<body>
    @if (session('success'))
    <p id="successMessage" class="text-green-500 bg-green-100 border border-green-400 p-2 rounded text-center">
        {{ session('success') }}
    </p>
@endif

@if (session('error'))
    <p id="errorMessage" class="text-red-500 bg-red-100 border border-red-400 p-2 rounded text-center">
        {{ session('error') }}
    </p>
@endif
    {{$slot}}


</body>
<script>
        // Auto-hide messages after 3 seconds
        setTimeout(() => {
        document.getElementById('successMessage')?.remove();
        document.getElementById('errorMessage')?.remove();
    }, 5000);
</script>
</html>