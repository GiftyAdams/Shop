<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping website</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full w-full">
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
    <x-nav />

    <main class="flex flex-col" id="main">

        {{$slot}}
    </main>


    <x-footer />
</body>
<script>
// JavaScript code here
document.addEventListener('DOMContentLoaded', function() {
    const footer = document.getElementById('footer');
    const main = document.getElementById('main');
    const nav = document.getElementById('nav');

    main.style.minHeight = `calc(98vh - ${footer.offsetHeight}px - ${nav.offsetHeight}px)`;
});
    // Auto-hide messages after 3 seconds
    setTimeout(() => {
        document.getElementById('successMessage')?.remove();
        document.getElementById('errorMessage')?.remove();
    }, 5000);
</script>

</html>