<?php

namespace App\Http\Controllers;


use App\Models\tip_produs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TipProdusController extends Controller
{
    public function show(tip_produs $tip_produs)
    {

        $nume = $tip_produs->nume;
        $text = $tip_produs->text;
    $tipuriproduse = tip_produs::pluck('image');

        return view('viewprodus', compact('tipuriproduse','nume','text'));

    }

    public function create()
    {
        return view('tip_produs.create');
    }

    public function shop()
    {
    $tipuriProduse = tip_produs::all();
    return view('shop', compact('tipuriProduse'));

    }
    public function store(Request $request)
    {
        $tipProdus = new TipProdus;
        $tipProdus->nume = $request->nume;
        $tipProdus->descriere = $request->descriere;

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $tipProdus->image = $filePath;
        }

        $tipProdus->save();

        return redirect()->back();
    }


}

