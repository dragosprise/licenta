<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tip_produs;

class PhotoController extends Controller
{
    public function index()
    {
        return view('produs');
    }


    public function upload(Request $request)
{

//    dd($request);
    //  Validate the uploaded file
    $request->validate([
        'nume' => 'required|string|max:255',
        'text' => 'required|string|max:255',
        'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            \Log::info('File found in the request'); // Log to confirm file is found
            $filePath = $file->store('uploads', 'public'); // Store the file in the 'public/uploads' directory
        } else {
            \Log::error('File not found in the request');
            return back()->withErrors(['image' => 'File not found in the request']);
        }

    // Store the uploaded file
        $nume = $request->input('nume');
        $text = $request->input('text');

    // Handle the stored file (e.g., save path to database)
    tip_produs::create([
        'nume' => $nume,
        'text' => $text,
        'image' => $filePath,
    ]);

    // Return a response or redirect
    return back()->with('success', 'Photo uploaded successfully.');
}

}
