<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{$title}}</title>
</head>
<body>
    <header>
        <div class="bg-gray-900 text-white py-4">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="{{ route('home') }}" class="font-semibold text-lg">Főoldal</a>
                    @auth
                        <a href="{{ route('character.index') }}" class="ml-4">Karakterek</a>
                        <a href="{{ route('character.create') }}" class="ml-4">Új Karakter</a>
                        @if(auth()->user()->admin)
                        <a href="{{ route('place.index') }}" class="ml-4">Helyszínek</a>
                        <a href="{{ route('place.create') }}" class="ml-4">Új Helyszín</a>
                        @endif
                    @endauth
                </div>
                <div>
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <form method="POST" action="{{ route('logout') }}" id="logout">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.querySelector('#logout').submit();"
                                        class="font-semibold">Kijelentkezés</a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold">Bejelentkezés</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-semibold">Regisztráció</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    {{$slot}}
</body>

</html>
