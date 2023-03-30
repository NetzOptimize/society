<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\User;
use App\Models\House;
use Illuminate\Database\QueryException;


class ResidentController extends Controller
{
    public function index()
    {
        $residents=Resident::orderBy('house_id')->get();

        return view('residents.index', compact('residents'));
    }

    public function create()
    {
        $users= User::where('usertype_id',2)->get();

        $houses= House::get();

        return view('residents.create', compact('users', 'houses'));
    }

    public function store(Request $req)
    {
        $attributes =$req->validate([
            'house_id' => 'required',
            'user_id' => 'required',
            'isOwner' => 'required',
            'datofoccupancy' => 'required|date'
        ]);

        $resident = Resident::recordExist($attributes)->first();

        if($resident)
        {
            return back()->with('success', 'record already exist');
        }

        $owner= Resident::where('house_id', $attributes['house_id'])->where('isOwner', 1)->first();

        if($owner)
        {
            if($attributes['isOwner'])
            {

                return back()->with('success', 'owner already exist');
            }
        }

        Resident::create($attributes);

        return redirect()->route('resident.index')->with('success', 'resident added successfully');
    }
    public function edit(Resident $resident)
    {
        $users= User::where('usertype_id',2)->get();

        $address = House::address($resident->house_id);

        $address = $address['Block1'].$address['Block2'].$address['house_no'];

        return view('residents.edit', compact('users','address', 'resident'));
    }

    public function update(Request $req, Resident $resident)
    {
        $attributes =$req->validate([
            'user_id' => 'required',
            'datofoccupancy' => 'required|date'
        ]);

        $resident->update([
                'user_id' => $attributes['user_id'],
                'datofoccupancy' => $attributes['datofoccupancy'],
        ]);

        return redirect()->route('resident.index');
    }

    public function delete(Resident $resident)
    {
        $resident->delete();

        return back()->with('success', 'record deleted successfully');
    }



}
