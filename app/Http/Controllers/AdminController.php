<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\PaymentMode;

class AdminController extends Controller
{

    public function index()
    {
        if(isset($_GET['sort']))
        {
            $expenses= Expense::sort($_GET['sort']);
        }
        elseif(isset($_GET['search']))
        {
            $expenses= Expense::search($_GET['search']);
        }
        else
        {
            $expenses= Expense::get();
        }

        return view('admins.index', compact('expenses'));
    }
    public function expenses()
    {
        $PaymentModes = PaymentMode::get();

        return view('admins.expense', compact('PaymentModes'));
    }
    public function store(Request $req)
    {
        $attributes= $req->validate([
            'payee' =>'required|min:3|max:255',
            'amount' => 'required|gt:0',
            'comments' => 'nullable',
            'payment_modes_id' =>'required',
            'dateofpayment' => 'required|date',
        ]);

        Expense::create($attributes);
        return back()->with('success', 'expenses added successfully');
    }
}
