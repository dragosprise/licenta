<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLocale(Request $request)
    {
        $locale = $request->input('locale');

        if (in_array($locale, ['en', 'ro', 'fr'])) {
            App::setLocale($locale);
        }

        return back(); // Redirect back to the previous page
    }
}
