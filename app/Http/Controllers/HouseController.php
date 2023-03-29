<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\User;

//new branch

class HouseController extends Controller
{
    public function index()
    {

        $houses = House::get();

        return view('houses.index', compact('houses'));
    }

}
