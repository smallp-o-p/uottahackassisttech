<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-base-100 dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif

        <div class="hero max-h-fit max-w-fit rounded-lg bg-base-200">
            <div class="hero-content text-center">
                @svg('fluentui-hand-wave-16-o')
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Thanks for checking out assist.tech!</h1>
                    <p class="py-6">A simple platform to collaborate online. Chat with peers, have live writing
                        sessions and (for the future) collab in environments in real time!</p>
                    <form method="GET" action="{{ route('login') }}">
                        <button type="submit" class="btn btn-primary text-lg" href="{{ route('login') }}">Let's get
                            started</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
