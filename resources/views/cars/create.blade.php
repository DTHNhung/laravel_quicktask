@extends('layouts.app')
@section('content')

    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create car
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-10">
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <div class="block">

                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Brand name...">

                @error('founded')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('founded') is-invalid @enderror"
                    name="founded"
                    value="{{ old('founded') }}"
                    placeholder="Founded...">

                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') }}"
                    placeholder="Description...">
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div class="m-auto w-4/5 pt-2 text-right">
        <a 
            href="{{ route('cars.index') }}"
            class="border-b-2 pb-2 border-dotted italic text-gray-500">
            Home &larr;
        </a>
    </div>

@endsection
