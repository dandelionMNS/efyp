<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased min-h-screen flex flex-col items-center" style='justify-content: space-between'>
    <header class="w-full px-5 mb-5 py-2 flex justify-between items-center shadow-lg">
        <div class="flex lg:justify-center lg:col-start-2 items-center">
            <img src='{{ asset('./assets/images/bg.png') }}' alt=logo style="height:60px;">
            <div
                class="border-l border-black font-semibold text-[#1c477a] ml-2 text-4xl pl-2 h-full flex justify-center items-end">
                E- FYP
            </div>
        </div>

        @if (Route::has('login'))
            <nav class="justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </header>

    <main class="mt-6 flex flex-col gap-3">
        <div class="flex flex-col gap-2 text-center">
            <h1 class="text-6xl font-semibold">Welcome to e-FYP Website</h1>
            <h3 class="text-lg">developed for <strong>University Technology Petronas</strong> students</h3>
        </div>
        <img src='{{ asset('./assets/images/welcome.jpg') }}' style="max-height: 600px" alt=welcome>
    </main>

    <footer class="py-6 text-center text-lg text-black">
        E-FYP | University Technology Petronas
    </footer>
</body>

</html>
