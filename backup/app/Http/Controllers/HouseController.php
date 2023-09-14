<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\User;
use App\Models\Resident;
use App\Models\Payment;

class HouseController extends Controller
{

    public function index()
    {
        if(isset($_GET['search']))
        {
            $houses = House::search($_GET['search']);
        }
        else
        {
            $houses = House::get();
        }
        return view('houses.index', compact('houses'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(House $house)
    {
        $owner= Resident::where('house_id',$house->id)->where('isOwner',true)->pluck('user_id');

        $owner= User::find($owner)->first();

        $tenant= Resident::where('house_id',$house->id)->where('isOwner',false)->pluck('user_id');

        $tenants= User::find($tenant);

        $payments= Payment::where('house_id',$house->id)->get();

        $next = House::where('id','>',$house->id)->orderby('id','asc')->first();

        $previous = House::where('id','<',$house->id)->orderby('id','desc')->first();

        $maxCount = House::orderby('id','desc')->first()->id;

        return view('houses.detail', compact('owner','tenants', 'payments', 'house', 'next', 'previous', 'maxCount'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
