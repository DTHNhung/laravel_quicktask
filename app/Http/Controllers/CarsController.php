<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Config;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = Car::paginate(config('view.paginate'));

        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
        ]);

        return redirect()
            ->route('cars.index', app()->getLocale())
            ->with('message', 'Create success data of car!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $car = Car::find($id);
        if (empty($car)) {
            return redirect()
                ->route('cars.index', app()->getLocale())
                ->with('message', 'No matching result found!');
        }

        return view('cars.show', [
            'car' => $car,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $car = Car::find($id);

        if (empty($car)) {
            return redirect()
                ->route('cars.index', app()->getLocale())
                ->with('message', 'No matching result found!');
        }
        
        return view('cars.edit', [
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $lang, $id)
    {
        $car = Car::where('id', $id)
            ->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
        ]);

        return redirect()
            ->route('cars.index', app()->getLocale())
            ->with('message', 'Update success data of car!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
        $car = Car::find($id);

        if (empty($car)) {
            return redirect()
                ->route('cars.index', app()->getLocale())
                ->with('message', 'No matching result found!');
        }

        $car->delete();

        return redirect()
            ->route('cars.index', app()->getLocale())
            ->with('message', 'Delete success data of car!');
    }
}
