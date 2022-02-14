@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">

        @if ($message = Session::get('message'))
            <div 
                class="bg-gradient-to-r from-gray-300 to-gray-200 p-5 text-500">
                {{ trans('message.' . $message) }}
            </div>
        @endif

        <div class="pt-10">
            <a 
                href="{{ route('cars.create', app()->getLocale()) }}"
                class="border-b-2 pb-2 border-dotted italic text-gray-500">
                {{ trans('titles.Add a new car') }} &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">
                    <div class="float-right">
                        <a
                            class="border-b-2 pb-2 border-dotted italic text-green-500"
                            href="{{ route('cars.edit', ['car' => $car->id, app()->getLocale(),] ) }}">
                            {{ trans('titles.Edit') }} &rarr;
                        </a>
                        <form 
                            action="{{ route('cars.destroy', ['car' => $car->id, app()->getLocale(),] ) }}"
                            class="pt-3"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button 
                                type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-red-500">
                                {{ trans('titles.Delete') }} &rarr;
                            </button>
                        </form>
                    </div>

                    <span class="uppercase text-blue-500 font-bold text-xc italic">
                        {{ trans('titles.Founded') }}: {{ $car->founded }}
                    </span>

                    <h2 class="text-gray-700 text-4xl hover:text-gray-500">
                        <a href="{{ route('cars.show', [
                                'car' => $car->id,
                                'language' => app()->getLocale(),
                            ] ) }}">
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
