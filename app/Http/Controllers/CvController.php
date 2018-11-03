<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    /**
     * @param string $pesel
     * @param string $fileName
     * @return file
     */
    public function show($pesel, $fileName){
        $user = Auth::user();

        $pesel = filter_var($pesel, FILTER_SANITIZE_NUMBER_INT);
        $fileName = filter_var($fileName, FILTER_SANITIZE_STRING);

        if (!$user->hasRole('administrator') && $user->PESEL != $pesel && $user->cv != $fileName){
            abort(403);
        }
        $path = Storage::path('cv/'.$pesel.'/'.$fileName);

        return response()->file($path);
    }
}
