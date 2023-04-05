<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\PaymentMode;
use App\Models\Payment;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PaymentController extends Controller
{
    public $initialpayment=2100;
    public  $monthlypayment=700;

    public function index()
    {
        $months = [
            'init'=> 'INITIAL PAYMENT', '01-01-2023' => 'January 2023', '01-02-2023'=> 'February 2023', '01-03-2023' => 'March 2023', '01-04-2023'=> 'April 2023', '01-05-2023' => 'May 2023', '01-06-2023' => 'June 2023', '01-07-2023' =>'July 2023', '01-08-2023' => 'August 2023', '01-09-2023' => 'September 2023', '01-10-2023' => 'October 2023', '01-11-2023' => 'November 2023', '01-12-2023' => 'December 2023'
        ];

        if(isset($_GET['month']))
        {
            $payments = Payment::Monthlyfilter($_GET['month']);
            $count = $payments->count();
            $sum = $payments->sum('amount');
        }
        elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
        {
            $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date']);
            $count = $payments->count();
            $sum = $payments->sum('amount');
        }
        elseif(isset($_GET['search']))
        {
            $house=$_GET['search'];
            $payments = Payment::whereHas('houses', function ($query) use ($house) {
                $query->where('full_address', 'Like', '%'.$house.'%');
            })->get();

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
            $payments = Payment::get();
            $count = $payments->count();
            $sum = $payments->sum('amount');
        }

        return view('payments.index', compact('payments', 'months', 'count', 'sum'));
    }

    public function create()
    {

        $houses = House::where('house_type', 'house')->get();

        $months = [
            'init'=> 'INITIAL PAYMENT', '01-01-2023' => 'January 2023', '01-02-2023'=> 'February 2023', '01-03-2023' => 'March 2023', '01-04-2023'=> 'April 2023', '01-05-2023' => 'May 2023', '01-06-2023' => 'June 2023', '01-07-2023' =>'July 2023', '01-08-2023' => 'August 2023', '01-09-2023' => 'September 2023', '01-10-2023' => 'October 2023', '01-11-2023' => 'November 2023', '01-12-2023' => 'December 2023'
        ];

        $PaymentModes = PaymentMode::get();

        return view('payments.create', compact('houses', 'months', 'PaymentModes'));
    }

    public function store(Request $req)
    {
        $totalAmount=0;
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
    public function ajax(Request $request)
    {
        $houseId = $request->input('house_id');
        $payments = Payment::where('house_id',$houseId)->get();

        $billingmonths = $payments->pluck('billingmonth');
        $dates = $payments->pluck('dateofdeposit');
        foreach($payments as $payment)
        {
            $modes[] =$payment->paymentmode->name;
        }

        return response()->json([

            'status' => 'success',
            'billingmonths' => $billingmonths,
            'dates' => $dates,
            'modes' => $modes
        ]);
    }
}
