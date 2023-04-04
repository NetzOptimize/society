<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\User;
use App\Models\Resident;
use App\Models\Payment;

//new branch

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::get();
        return view('houses.index', compact('houses'));
    }

    public function detail(House $house)
    {
        $owner= Resident::where('house_id',$house->id)->where('isOwner',1)->pluck('user_id');

        $owner= User::find($owner)->first();

        $tenant= Resident::where('house_id',$house->id)->where('isOwner',0)->pluck('user_id');

        $tenants= User::find($tenant)->toarray();

        $payments= Payment::where('house_id',$house->id)->get();

        return view('houses.detail', compact('owner','tenants', 'payments', 'house'));
    }

}
