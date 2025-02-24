<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping website</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full w-full">
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
</script>

</html>