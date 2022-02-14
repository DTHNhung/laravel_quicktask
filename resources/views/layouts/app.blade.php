<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link 
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Car</title>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-md p-2">
        <nav class="m-auto w-4/5 flex flex-wrap items-center">
            <div class="flex-1 py-1">
                <a href="{{ route('cars.index', app()->getLocale()) }}">
                    <h2 class=" text-blue-500 text-4xl font-bold">
                        <i class="fa-solid fa-car-crash"></i>
                        CAR
                    </h2>
                </a>
            </div>
            
            <div class="flex-1">
                <button class="flex sm:hidden flex-1 justify-end cursor-pointer pt-3">
                    <i class="text-2xl fas fa-bars"></i>
                </button>
                <ul class="sm:flex flex-1 justify-end items-center gap-8 text-bookmark-blue uppercase text-xs">
                    <li class="flex rounded-md px-4 py-2 bg-blue-400">
                        {{ App::getLocale() }}
                    </li>
                    @foreach (config('languages') as $key => $lang)
                        @if ($key != App::getLocale())
                            <li>
                                @if (substr_count(Route::current()->uri(), '{car}') > 0)
                                    <a 
                                        href="{{ route(Route::currentRouteName(), ['language' => $key, 'car' => $car->id,]) }}"
                                        class="cursor-pointer flex rounded-md hover:bg-gray-200 px-4 py-2">
                                        {{ $key }}
                                    </a>
                                @else
                                    <a 
                                        href="{{ route(Route::currentRouteName(), $key) }}"
                                        class="cursor-pointer flex rounded-md hover:bg-gray-200 px-4 py-2">
                                        {{ $key }}
                                    </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            
        </nav>
    </header>
    
    @yield('content')
</body>
</html>
