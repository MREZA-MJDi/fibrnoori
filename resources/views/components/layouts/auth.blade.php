@props([
'title' => 'ورود | فیبر نوری',
'description' => 'ورود به سامانه فیبر نوری',
])

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <meta
        name="theme-color"
        content="#2563eb"
    >

    <meta
        name="description"
        content="{{ $description }}"
    >

    <title>{{ $title }}</title>


    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])


    @stack('head')

</head>


<body
    class="
        min-h-screen
        bg-white
        text-slate-950
        antialiased
    "
>

{{ $slot }}


<script>
    document.documentElement.classList.remove('no-js');
</script>


@stack('scripts')

</body>

</html>
