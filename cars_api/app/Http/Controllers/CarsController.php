<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Http\Requests\CarsRequest;

// методы create и edit - для визуального отображения форм. У нас Rest API!! Удаляем....

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cars::paginate(5);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $request)
    {
        return Cars::created($request-> validate());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Cars::findOfFaill($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarsRequest $request, Cars $cars)
    {
        $cars->fill($request-> validate());
        return $cars-> save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        if ($cars-> delete()) {
            return response(null, 404);
        }
        return null;
    }
}
