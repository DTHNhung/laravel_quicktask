@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold pb-10">
                Cars
            </h1>
        </div>

        @if ($message = Session::get('message'))
            <div 
                class="bg-gradient-to-r from-gray-300 to-gray-200 p-5 text-500">
                {{ $message }}    
            </div>
        @endif

        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">

                    <span class="uppercase text-blue-500 font-bold text-xc italic">
                        Founed: {{ $car->founded }}
                    </span>

                    <h2 class="text-gray-700 text-4xl hover:text-gray-500">
                        <a href="{{ route('cars.show', [ 'car' => $car->id, ] ) }}">
                            {{ $car->name }}
                        </a>
                    </h2>

                    <p class="text-lg text-gray-700 py-6">
                        {{ $car->description }}
                    </p>

                    <hr class="mt-4 mb-8">

                </div>
            @endforeach
        </div>

        {{ $cars->links() }}
    </div>

@endsection
