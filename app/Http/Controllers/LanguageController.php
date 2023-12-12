<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage(string $language){
        // var_dump($language);
        // die();
        $languages = ['uk', 'en'];
        if(!in_array($language, $languages)){
            return response()->json(['ok' => false, 'language' => app()->getLocale(), 400]);
        }
        session(['language' => $language]);
        session()->put('locale', $language);
        // App::setLocale($language);
        return response()->json(['ok' => true, 'language' => $language]);

    }
}
