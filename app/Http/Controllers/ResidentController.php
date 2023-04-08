<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\User;
use App\Models\House;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ResidentController extends Controller
{
    public function index()
    {
        $residents=Resident::orderBy('house_id')->get();

        return view('residents.index', compact('residents'));
    }

    public function create()
    {
        $users= User::where('usertype_id',2)->orderby('name','asc')->get();

        $houses = House::where('house_type', 'house')->get();

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
            return back()->with('success', 'Record Already Exist');
        }

        $owner= Resident::where('house_id', $attributes['house_id'])->where('isOwner', 1)->first();

        if($owner)
        {
            if($attributes['isOwner'])
            {

                return back()->with('success', 'Owner Already Exist');
            }
        }

        Resident::create([
            'house_id' => $attributes['house_id'],
            'user_id' => $attributes['user_id'],
            'isOwner' => $attributes['isOwner'],
            'datofoccupancy' => Carbon::parse($attributes['datofoccupancy'])->format('d-m-Y')
        ]);

        return redirect()->route('resident.index')->with('success', 'Resident Added Successfully');
    }
    public function edit(Resident $resident)
    {
        $users= User::where('usertype_id',2)->orderby('name','asc')->get();

        $houses = House::where('house_type', 'house')->get();

        $occupancyTypes = ['0' => 'Tenant', '1' => 'Owner'];

        return view('residents.edit', compact('users', 'resident', 'houses', 'occupancyTypes'));
    }

    public function update(Request $req, Resident $resident)
    {
        $attributes =$req->validate([
            'house_id' => 'required',
            'isOwner' => 'required',
            'user_id' => 'required',
            'datofoccupancy' => 'required|date'
        ]);

        $owner= Resident::where('house_id', $attributes['house_id'])->where('isOwner', 1)->where('id', '!=', $resident->id)->first();

        if($owner)
        {
            if($attributes['isOwner'])
            {

                return back()->with('success', 'Owner Already Exist');
            }
        }


        $resident->update([
                'user_id' => $attributes['user_id'],
                'datofoccupancy' =>  Carbon::parse($attributes['datofoccupancy'])->format('d-m-Y'),
                'house_id' => $attributes['house_id'],
                'isOwner' => $attributes['isOwner'],
        ]);

        return redirect()->route('resident.index');
    }

    public function delete(Resident $resident)
    {
        $resident->delete();

        return back()->with('success', 'Record Deleted Successfully');
    }



}
