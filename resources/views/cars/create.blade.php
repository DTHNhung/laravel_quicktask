@extends('layouts.app')
@section('content')

    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ trans('titles.Create car') }}
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-10">
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <div class="block">

                @error('name')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.name'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="{{ trans('titles.Brand name') }}...">

                @error('founded')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.founded'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('founded') is-invalid @enderror"
                    name="founded"
                    value="{{ old('founded') }}"
                    placeholder="{{ trans('titles.Founded') }}...">

                @error('description')
                    <div class="text-red-500">{{ __($message, ['name' => trans('titles.description'),]) }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') }}"
                    placeholder="{{ trans('titles.Description') }}...">
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    {{ trans('titles.Submit') }}
                </button>
            </div>
        </form>
    </div>

@endsection
