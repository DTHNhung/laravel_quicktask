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
                    {{ trans('titles.Founded') }}: {{ $car['founded'] }}
                </span>
                <p class="text-lg text-gray-700 py-6 pb-10">
                    {{ $car['description'] }}
                </p>

                @if ( count($car->carModels) > 0)
                    <table class="table-auto m-auto">
                        <tr class="bg-blue-100">
                            <th class="w-1/4 border-4 border-gray-500">
                                {{ trans('titles.Models') }}
                            </th>
                        
                            <th class="w-1/4 border-4 border-gray-500">
                                {{ trans('titles.Engines') }}
                            </th>

                            <th class="w-1/4 border-4 border-gray-500">
                                {{ trans('titles.Date') }}
                            </th>
                        </tr>

                        @foreach ($car->carModels as $model)
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
                        @endforeach
                    </table>

                @else
                    {{ trans('message.No car models found!') }}
                @endif

                <p class="text-left">
                    {{ trans('titles.Product types') }}:
                    @forelse ($car->products as $product)
                        {{ $product->name }}
                    @empty
                        {{ trans('message.No car product description') }}
                    @endforelse
                </p>

                <hr class="mt-4 mb-8">

            </div>
        </div>

    </div>
@endsection
