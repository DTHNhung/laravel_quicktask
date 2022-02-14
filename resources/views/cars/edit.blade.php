@extends('layouts.app')
@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ trans('titles.Update car') }}
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-10">
        <form action="{{ route('cars.update', ['car' => $car->id,]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">

                @error('name')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.name'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ $car->name }}">

                @error('founded')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.founded'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('founded') is-invalid @enderror"
                    name="founded"
                    value="{{ $car->founded}}">

                @error('description')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.description'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ $car->description }}">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    {{ trans('titles.Update') }}
                </button>
            </div>
        </form>
    </div>

@endsection
