<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //
    public function googlemap(){
        return view('googlemap');     
    }
}