<?php

namespace App\Http\Controllers;

use App\Models\Mestesug;
use App\Models\tip_mestesug;
use Illuminate\Http\Request;

class MestesugController extends Controller
{
    public function index()
    {
        return view('mestesug');
    }

    public function upload(Request $request){
        $request->validate([
            'denumire' => 'required|string|max:255',
            'descriere' => 'required|string|max:255',
        ]);
        $denumire = $request->input('denumire');
        $descriere = $request->input('descriere');
        Mestesug::create([
            'denumire' => $denumire,
            'descriere' => $descriere,
        ]);
        return back()->with('success', 'Datele au fost incarcate cu succes.');
    }
    public function shop()
    {


        $tipuriMestesugs = Mestesug::all();
//        dd($tipuriMestesugs);
        return view('viewmestesug', compact('tipuriMestesugs'));
    }
}
