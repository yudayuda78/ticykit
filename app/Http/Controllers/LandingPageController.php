<?php

namespace App\Http\Controllers;

use App\Models\Worksheet;
use Illuminate\Http\Request;

class LandingPageController
{
    function index(){

        $isiContent = Worksheet::take(12)->get();
        $fullContent = Worksheet::all();

        return view('index', [
            "isiContent" => $isiContent,
            "fullContent" =>$fullContent,
            'title' => 'TicyKit'
        ]);
    }

}
