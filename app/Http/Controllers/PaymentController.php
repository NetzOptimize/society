<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\PaymentMode;
use App\Models\Payment;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public $initialpayment = 2100;
    public $monthlypayment = 700;
    public function index()
    {

        $months = config('global.months');

        if(isset($_GET['month']))
        {

            if (array_key_exists($_GET['month'], config('global.months'))) {

                $payments = Payment::Monthlyfilter($_GET['month'])->pluck('id')->toarray();
                $payments = Payment::sortedData($payments)->get();
                $count = $payments->count();
                $sum = $payments->sum('amount');
            }
            else {
                return redirect()->route('payments.index')->with('error','Invalid Request');
            }
        }
        elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
        {
            $startdate = strtotime($_GET['start_date']);
            $enddate = strtotime($_GET['end_date']);

            if ( $startdate == true &&  $enddate == true) {
                $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date'])->pluck('id')->toarray();;
                $payments = Payment::sortedData($payments)->get();
                $count = $payments->count();
                $sum = $payments->sum('amount');
            } else {
                return redirect()->route('payments.index')->with('error','Invalid Request');
            }
        }
        elseif(isset($_GET['search']))
        {
            $house=$_GET['search'];
            $payments = Payment::whereHas('houses', function ($query) use ($house) {
                $query->where('full_address', 'Like', '%'.$house.'%');
            })->get()->pluck('id')->toarray();

            $payments = Payment::sortedData($payments)->get();
            $count = $payments->count();
            $sum = $payments->sum('amount');
        }
        elseif(isset($_GET['unpaid']))
        {
            $month =  $_GET['unpaid'];

            $payments = DB::table('houses')
            ->selectRaw('houses.full_address')
            ->where('houses.house_type', 'house')
            ->whereNotIn('houses.id', function ($query) use ($month) {
                $query->select('house_id')
                    ->from('payments')
                    ->distinct()
                    ->where('billingmonth', $month);
            })->get();

            $count = $payments->count();
            $sum = 0 ;
        }
        else
        {
            $payments = Payment::get()->pluck('id')->toarray();
            $payments = Payment::sortedData($payments)->get();
            $count = $payments->count();
            $sum = $payments->sum('amount');
        }

        return view('payments.index', compact('payments', 'months', 'count', 'sum'));
    }


    public function create()
    {
        $houses = House::with('residents')->where('house_type', 'house')->get();

        $months = config('global.months');

        $PaymentModes = PaymentMode::get();

        return view('payments.create', compact('houses', 'months', 'PaymentModes'));
    }


    public function store(Request $req, Payment $payment)
    {
        $req->validate([
            'house_id' =>'required',
            'billingmonth' => 'required',
            'payment_modes_id' =>'required',
            'dateofdeposit' => 'required',
            'comments' => 'nullable'
        ]);

        if($req['billingmonth'][0] == 'init')
        {

            $initialpayment = Payment::where('house_id', $req->house_id)->where('billingmonth','init')->first();

            if($initialpayment == null)
            {
                Payment::create([

                    'house_id' => $req['house_id'],
                    'billingmonth' => $req['billingmonth'][0],
                    'amount' => $this->initialpayment,
                    'payment_modes_id' => $req->payment_modes_id,
                    'dateofdeposit' => Carbon::parse($req->dateofdeposit)->format('d-m-Y'),
                    'comments' => $req['comments'],
                ]);

                if($req['billingmonth'])
                {
                    foreach($req['billingmonth'] as $month)
                    {
                        if(Payment::where('house_id', $req->house_id)->where('billingmonth',$month)->first() == null)
                        {
                            Payment::create([

                                'house_id' => $req['house_id'],
                                'billingmonth' => $month,
                                'amount' => $this->monthlypayment,
                                'payment_modes_id' => $req->payment_modes_id,
                                'dateofdeposit' => Carbon::parse($req->dateofdeposit)->format('d-m-Y'),
                                'comments' => $req['comments']
                            ]);
                        }
                    }
                }
                return back()->with('success', 'Payment Added Successfully');
            }
        }
        else
        {
            foreach($req['billingmonth'] as $month)
            {
                if(Payment::where('house_id', $req->house_id)->where('billingmonth',$month)->first() == null)
                {
                    Payment::create([
                        'house_id' => $req['house_id'],
                        'billingmonth' => $month,
                        'amount' => $this->monthlypayment,
                        'payment_modes_id' => $req->payment_modes_id,
                        'dateofdeposit' => Carbon::parse($req->dateofdeposit)->format('d-m-Y'),
                        'comments' => $req['comments']
                    ]);

                }
            }
            return back()->with('success', 'Payment Added Successfully');
        }
    }


    public function show(Payment $payment)
    {
        //
    }


    public function edit(Payment $payment)
    {
        $houses = House::with('residents')->where('house_type', 'house')->get();

        $months = config('global.months');

        $PaymentModes = PaymentMode::get();

        return view('payments.edit', compact('payment', 'houses', 'months', 'PaymentModes'));
    }


    public function update(Request $req, Payment $payment)
    {
        $attributes= $req->validate([
            'house_id' =>'required',
            'billingmonth' => 'required',
            'payment_modes_id' =>'required',
            'dateofdeposit' => 'required',
            'comments' => 'nullable'
        ]);

        $exists = Payment::where('house_id',$attributes['house_id'])->where('billingmonth',$attributes['billingmonth'] )->first();

        if($exists)
        {
            return back()->with('error', 'Payment Already Exists');
        }

        $payment->update($attributes);

        return redirect()->route('payments.index')->with('success', 'Payment Edited Succesfully');
    }

    public function destroy(Payment $payment)
    {
        abort_if(auth()->user()->usertype_id != User::ADMIN, 403, 'Access Deined');

        $payment->delete()->with('success','payment deleted successfully');
        return redirect()->back();
    }

    public function ajax(Request $request)
    {
        $houseId = $request->input('house_id');
        $payments = Payment::where('house_id',$houseId)->get();
        $billingmonths = $payments->pluck('billingmonth');

        return response()->json([
            'status' => 'success',
            'billingmonths' => $billingmonths,
        ]);
    }
}
