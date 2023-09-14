<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\House;
use App\Models\PaymentMode;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Activitylog;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function index($id=0)
    {
        if(isset($_GET['sort']))
        {
            $expenses= Expense::sort($_GET['sort']);
            $count = $expenses->count();
            $sum = $expenses->sum('amount');
        }
        elseif(isset($_GET['search']))
        {
            $expenses= Expense::search($_GET['search']);
            $count = $expenses->count();
            $sum = $expenses->sum('amount');
        }
        elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
        {
            $startdate = strtotime($_GET['start_date']);
            $enddate = strtotime($_GET['end_date']);

            if ( $startdate == true &&  $enddate == true) {
                $expenses = Expense::Datebetween($_GET['start_date'], $_GET['end_date']);
                $count = $expenses->count();
                $sum = $expenses->sum('amount');
            } else {
                return redirect()->route('payments.index')->with('error','Invalid Request');
            }
        }
        else
        {
            $expenses= Expense::simplepaginate(15);
            $count = $expenses->count();
            $sum = $expenses->sum('amount');
        }

        return view('admins.index', compact('expenses','sum', 'count','id'));
    }

    public function create()
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

        $expense=Expense::create([
            'payee' => $attributes['payee'],
            'amount' => $attributes['amount'],
            'comments' => $attributes['comments'],
            'payment_modes_id' =>$attributes['payment_modes_id'],
            'dateofpayment' => Carbon::parse($attributes['dateofpayment'])->format('d-m-Y'),
        ]);

        Activitylog::create([
            'user_id' => Auth::user()->id,
            'action' => 'Created',
            'module_id' => 2,
            'module_item_id' => $expense->id
        ]);

        return back()->with('success', 'Expenses Added Successfully');
    }


    public function report(Request $request)
    {
        $month = $request->input('month');

        $houses = House::whereHas('payments', function($query) use ($month) {
            $query->where('billingmonth', $month);
        })->get()->toArray();

        return ['houses' => $houses];
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Expense $expense)
    {
        $PaymentModes = PaymentMode::get();

        return view('admins.edit', compact('expense', 'PaymentModes'));
    }

    public function update(Request $request, Expense $expense)
    {

        $attributes= $request->validate([
            'payee' =>'required|min:3|max:255',
            'amount' => 'required|gt:0',
            'comments' => 'nullable',
            'payment_modes_id' =>'required',
            'dateofpayment' => 'required|date',
        ]);

        $expense->update([
            'payee' => $attributes['payee'],
            'amount' => $attributes['amount'],
            'comments' => $attributes['comments'],
            'payment_modes_id' =>$attributes['payment_modes_id'],
            'dateofpayment' => Carbon::parse($attributes['dateofpayment'])->format('d-m-Y'),
        ]);

        Activitylog::create([
            'user_id' => Auth::user()->id,
            'action' => 'Updated',
            'module_id' => 2,
            'module_item_id' => $expense->id
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expenses Updated Successfully');
    }


    public function destroy(Expense $expense)
    {
        abort_if(auth()->user()->usertype_id != User::ADMIN, 403, 'Access Deined');

        Activitylog::create([
            'user_id' => Auth::user()->id,
            'action' => 'Deleted',
            'module_id' => 2,
            'module_item_id' => $expense->id
        ]);

        $expense->delete();

        return back()->with('success','expense deleted successfully');
    }
}