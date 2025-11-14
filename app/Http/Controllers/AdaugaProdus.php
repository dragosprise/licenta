<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdaugaProdus extends Controller
{
    public function index()
    {
        $tipuriProduse = TipProdus::all();
        return view('tip_produs.index', compact('tipuriProduse'));
    }

    public function create()
    {
        return view('tip_produs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required|string|max:255',
            'descriere' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tipProdus = new TipProdus;
        $tipProdus->nume = $request->nume;
        $tipProdus->descriere = $request->descriere;

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $tipProdus->image = $filePath;
        }

        $tipProdus->save();

        return redirect()->route('tip_produs.index')->with('success', 'Produs adaugat cu succes');
    }
}
