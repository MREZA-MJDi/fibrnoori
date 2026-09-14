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

    {{-- ==========================================================
         BASIC META
    =========================================================== --}}

    <meta
        name="theme-color"
        content="#2563eb"
    >

    <meta
        name="description"
        content="{{ $description }}"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <title>{{ $title }}</title>


    {{-- ==========================================================
         OPEN GRAPH
         Used by link previews in messaging apps / social apps
    =========================================================== --}}

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:site_name"
        content="فیبر نوری"
    >

    <meta
        property="og:title"
        content="{{ $title }}"
    >

    <meta
        property="og:description"
        content="{{ $description }}"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta
        property="og:image"
        content="{{ asset('images/og-fibernet.jpg') }}"
    >

    <meta
        property="og:image:alt"
        content="فیبر نوری"
    >


    {{-- ==========================================================
         TWITTER / X
    =========================================================== --}}

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="{{ $title }}"
    >

    <meta
        name="twitter:description"
        content="{{ $description }}"
    >


    <meta
        name="twitter:image:alt"
        content="فیبر نوری"
    >


    {{-- ==========================================================
         VITE
    =========================================================== --}}

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
