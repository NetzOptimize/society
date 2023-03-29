<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\PaymentMode;
use App\Models\Payment;
use App\Models\Resident;

class PaymentController extends Controller
{
    public $initialpayment=2100;
    public  $monthlypayment=700;

    public function index()
    {
        $months = [
            'init'=> 'INITIAL PAYMENT', '2023-01-01' => 'January', '2023-02-01'=> 'February', '2023-03-01' => 'March', '2023-04-01'=> 'April', '2023-05-01' => 'May', '2023-06-01' => 'June', '2023-07-01' =>'July', '2023-08-01' => 'August', '2023-09-01' => 'September', '2023-10-01' => 'October', '2023-11-01' => 'November', '2023-12-01' => 'December'
        ];

        if(isset($_GET['month']))
        {
            $payments = Payment::Monthlyfilter($_GET['month']);
        }
        elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
        {
            $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date']);
        }
        elseif(isset($_GET['search']))
        {
            $house=$_GET['search'];
            $payments = Payment::whereHas('houses', function ($query) use ($house) {
                $query->where('Block1', 'Like', '%'.$house.'%');
            })->get();
        }
        else
        {
            $payments = Payment::get();
        }

        return view('payments.index', compact('payments', 'months'));
    }

    public function create()
    {

        $houses= House::where('house_type','House')->get();

        $months = [
            'init'=> 'INITIAL PAYMENT', '2023-01-01' => 'January', '2023-02-01'=> 'February', '2023-03-01' => 'March', '2023-04-01'=> 'April', '2023-05-01' => 'May', '2023-06-01' => 'June', '2023-07-01' =>'July', '2023-08-01' => 'August', '2023-09-01' => 'September', '2023-10-01' => 'October', '2023-11-01' => 'November', '2023-12-01' => 'December'
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
        ]);

        if($req['billingmonth'][0] == 'init')
        {

            $initialpayment = Payment::where('house_id', $req->house_id)->first();


            if($initialpayment)
            {
                return back()->with('success', 'initial payment has already been paid');
            }
            else
            {
                // initialpayment
                Payment::create([

                    'house_id' => $req['house_id'],
                    'billingmonth' => $req['billingmonth'][0],
                    'amount' => $this->initialpayment,
                    'payment_modes_id' => $req->payment_modes_id,
                    'dateofdeposit' => $req->dateofdeposit
                ]);

                if($req['billingmonth'])
                {
                    foreach($req['billingmonth'] as $month)
                    {
                        if(Payment::where('house_id', $req->house_id)->where('billingmonth',$month)->first())
                        {
                            continue;
                        }
                        else
                        {
                            Payment::create([

                                'house_id' => $req['house_id'],
                                'billingmonth' => $month,
                                'amount' => $this->monthlypayment,
                                'payment_modes_id' => $req->payment_modes_id,
                                'dateofdeposit' => $req->dateofdeposit
                            ]);
                        }
                        $totalAmount += $this->monthlypayment;
                    }
                    $totalAmount += $this->initialpayment;
                }
                return back()->with('success', 'Rs '.$totalAmount.' added successfully');
            }
        }
        else
        {
            $initialpayment = Payment::where('house_id', $req->house_id)->first();

            if($initialpayment)
            {
                foreach($req['billingmonth'] as $month)
                {
                    if(Payment::where('house_id', $req->house_id)->where('billingmonth',$month)->first())
                    {
                        continue;
                    }
                    else
                    {
                        Payment::create([
                            'house_id' => $req['house_id'],
                            'billingmonth' => $month,
                            'amount' => $this->monthlypayment,
                            'payment_modes_id' => $req->payment_modes_id,
                            'dateofdeposit' => $req->dateofdeposit
                        ]);

                    }
                    $totalAmount += $this->monthlypayment;
                }
                return back()->with('success', 'Rs '.$totalAmount.' added successfully');
            }
            return back()->with('success', ' initial payment remains unpaid');
        }

    }
}
