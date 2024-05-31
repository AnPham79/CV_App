<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supper CV CR</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-700">
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index')  }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li class="text-sm">
                    Hi: {{ auth()->user()->name ?? 'Anynomus' }}
                </li>
                <li class="text-sm">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                      </form>
                </li>
            @else
                <li class="text-sm">
                    <a href="{{ route('auth.login') }}">Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
