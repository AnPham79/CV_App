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
                <li class="text-sm underline decoration-solid">
                    <a href="{{ route('my-jobs.index') }}">
                        My job
                    </a>
                </li>
                <li class="text-sm">
                   <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anynomus' }}: Applications
                   </a>
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

    @if(session()->has('success'))
        <div class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">
                Success !
                <p>{{ session()->get('success') }}</p>
            </p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
