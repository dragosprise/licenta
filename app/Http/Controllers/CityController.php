<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
{
    $cities = City::all(); // Assuming you have a City model and want to retrieve all cities

    return view('cities.index', ['cities' => $cities]);
}
    public function show($city)
    {
        // Retrieve the city details from the database or any other data source
        // For example:
        $cityData = City::where('name', $city)->first();
    
        // Pass the city data to the view or perform any other logic
        return view('cities.show', compact('cityData'));
    }
}
