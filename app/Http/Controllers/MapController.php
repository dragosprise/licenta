<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map2()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 45.246150,
                    'lng' => 27.938135
                ],
                'draggable' => true,
                'name' => 'ceva'
            ],
           
        ];
        return view('map', compact('initialMarkers'));
    }
}
