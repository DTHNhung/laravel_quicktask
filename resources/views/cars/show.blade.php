@extends('layouts.app')
@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $car->name }}
            </h1>
            <p class="text-lg text-gray-700 py-6">
                {{ $car->headquarter->headquarter}}, {{ $car->headquarter->country}}
            </p>
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xc italic">
                    Founed: {{ $car['founded'] }}
                </span>
                <p class="text-lg text-gray-700 py-6 pb-10">
                    {{ $car['description'] }}
                </p>

                <table class="table-auto m-auto">
                    <tr class="bg-blue-100">
                        <th class="w-1/4 border-4 border-gray-500">
                            Models
                        </th>
                    
                        <th class="w-1/4 border-4 border-gray-500">
                            Engines
                        </th>

                        <th class="w-1/4 border-4 border-gray-500">
                            Date
                        </th>
                    </tr>

                    @forelse ($car->carModels as $model)
                        <tr>
                            <td class="border-4 border-gray-500 text-center">
                                {{ $model->model_name }}
                            </td>

                            <td class="border-4 border-gray-500 text-center">
                                @foreach ($car->engines as $engine)
                                    @if ($model->id == $engine->model_id)
                                        {{ $engine->engine_name }}
                                    @endif
                                @endforeach
                            </td>

                            <td class="border-4 border-gray-500 text-center">
                                {{ date('d-m-Y', strtotime($car->productionDate->created_at)) }}
                            </td>
                        </tr>
                    @empty
                        No car models found!
                    @endforelse
                </table>

                <p class="text-left">
                    Product types:
                    @forelse ($car->products as $product)
                        {{ $product->name }}
                    @empty
                        <p>
                            No car product description
                        </p>
                    @endforelse
                </p>

                <hr class="mt-4 mb-8">
                
                <div class="pt-2 text-right">
                    <a 
                        href="{{ route('cars.index') }}"
                        class="border-b-2 pb-2 border-dotted italic text-gray-500">
                        Home &larr;
                    </a>
                </div>

            </div>
        </div>

    </div>
@endsection
