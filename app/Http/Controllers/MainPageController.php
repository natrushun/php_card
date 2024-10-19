<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Contest;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        //nem volt specifikálva de feltételezem hogy a játszható karakterek számítanak csak
        $charactersCount = Character::where('enemy', false)->get()->count();

        $contestsCount = Contest::count();

        return view('mainpage', ['charactersCount'=>  $charactersCount, 'contestsCount'=>$contestsCount]);
    }
}
