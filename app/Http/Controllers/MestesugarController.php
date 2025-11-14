<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mestesugar;
use Illuminate\Support\Facades\Log;

class MestesugarController extends Controller
{
    public function index()
    {
//        if (auth()->check()) {
//            $user_id = auth()->id();
//        }
//        dd($user_id);
//        Log::info('Mestesugar index method called.');
        return view('register_mestesugar');
    }

    public function upload(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'descriere' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            Log::info('File found in the request'); // Log to confirm file is found
            $filePath = $file->store('uploads', 'public'); // Store the file in the 'public/uploads' directory
        } else {
            Log::error('File not found in the request');
            return back()->withErrors(['image' => 'File not found in the request']);
        }
        $name = $request->input('name');
        $descriere = $request->input('descriere');
        $user_id = auth()->id();


        Mestesugar::create([
            'name' => $name,
            'user_id' => $user_id,
            'descriere' => $descriere,
            'image' => $filePath,
        ]);


        // Return a response or redirect
        return back()->with('success', 'Photo uploaded successfully.');
    }

    public function show(Mestesugar $mestesugar)
    {

//        $name = $mestesugar->name;
//        $descriere = $mestesugar->descriere;
        $mestesugar = Mestesugar::all();

        return view('mestesugari', compact('mestesugar'));

    }
}
