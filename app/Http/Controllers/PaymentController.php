<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\PaymentMode;
use App\Models\Activitylog;
use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public $initialpayment = 2100;
    public $monthlypayment = 700;


    // public function index($id=0)
    // {

    //     $months = config('global.months');

    //     if(isset($_GET['month']))
    //     {

    //         if (array_key_exists($_GET['month'], config('global.months'))) {

    //             $payments = Payment::Monthlyfilter($_GET['month'])->pluck('id')->toarray();
    //             $payments = Payment::sortedData($payments)->get();
    //             $count = $payments->count();
    //             $sum = $payments->sum('amount');
    //         }
    //         else {
    //             return redirect()->route('payments.index')->with('error','Invalid Request');
    //         }
    //     }
    //     elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
    //     {
    //         $startdate = strtotime($_GET['start_date']);
    //         $enddate = strtotime($_GET['end_date']);

    //         if ( $startdate == true &&  $enddate == true) {
    //             $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date'])->pluck('id')->toarray();
    //             $payments = Payment::sortedData($payments)->get();
    //             $count = $payments->count();
    //             $sum = $payments->sum('amount');
    //         } else {
    //             return redirect()->route('payments.index')->with('error','Invalid Request');
    //         }
    //     }
    //     elseif(isset($_GET['sort']))
    //     {
    //         $payments= Payment::sort($_GET['sort']);

    //         $count = $payments->count();
    //         $sum = $payments->sum('amount');

    //     }
    //     elseif(isset($_GET['unpaid']))
    //     {
    //         $month =  $_GET['unpaid'];

    //         $payments = DB::table('houses')
    //             ->selectRaw('houses.full_address')
    //             ->where('houses.house_type', 'house')
    //             ->whereNotIn('houses.id', function ($query) use ($month) {
    //                 $query->select('house_id')
    //                     ->from('payments')
    //                     ->distinct()
    //                     ->where('billingmonth', $month);
    //             })->get();

    //         $count = $payments->count();
    //         foreach ($payments as $payment) {
    //             $array[] = House::where('full_address',$payment->full_address)->first();
    //         }

    //         $sum=0;
    //         $payments= collect($array);
    //     }
    //     else
    //     {
    //         $payments = Payment::Monthlyfilter(Carbon::now()->startOfMonth()->format('d-m-Y'))->pluck('id')->toarray();
    //         $payments = Payment::sortedData($payments)->get();
    //         $count = $payments->count();
    //         $sum = $payments->sum('amount');
    //     }

    //     return view('payments.index', compact('payments', 'months', 'count', 'sum', 'id'));
    // }
    public function index($id=0)
    {
        $resident = null;
        $months = config('global.months');

        if(isset($_GET['sort']))
        {
            $payments= Payment::sort($_GET['sort'], $_GET['month'], $_GET['start_date'], $_GET['end_date']);

            $count = $payments->count();
            $sum = $payments->sum('amount');

        }
        elseif(isset($_GET['month']) && !isset($_GET['tableView']))
        {

            if($_GET['month']=='All')
            {
                $payments = Payment::get()->pluck('id')->toarray();
                $payments = Payment::sortedData($payments)->get();
                $count = $payments->count();
                $sum = $payments->sum('amount');
            }
            else
            {
                $payments = Payment::Monthlyfilter($_GET['month'])->pluck('id')->toarray();
                $payments = Payment::sortedData($payments)->get();
                $count = $payments->count();
                $sum = $payments->sum('amount');
            }
        }
        elseif(isset($_GET['start_date']) && isset($_GET['end_date']))
        {
            $startdate = strtotime($_GET['start_date']);
            $enddate = strtotime($_GET['end_date']);

            if ( $startdate == true &&  $enddate == true) {
                $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date'])->pluck('id')->toarray();
                // $payments = Payment::Datebetween($_GET['start_date'], $_GET['end_date']);
                // dd($payments->first());
                // $data= Payment::whereNotIn('id', $payments)->get();

                $payments = Payment::sortedData($payments)->get();
                $count = $payments->count();
                $sum = $payments->sum('amount');
            } else {
                return redirect()->route('payments.index')->with('error','Invalid Request');
            }
        }

        elseif(isset($_GET['unpaid']) && !isset($_GET['tableView']))
        {
            $month =  $_GET['unpaid'];

            if($month == 'All') {
                $payments = House::whereNotIn('id', function ($query) {
                    $query->select('house_id')
                        ->from('payments');
                })
                ->get();

                $count = count($payments);
                $sum=0;

            }
            else {

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
                foreach ($payments as $payment) {
                    $array[] = House::where('full_address',$payment->full_address)->first();
                }

                $sum=0;
                $payments= collect($array);
            }

        }
        else
        {
        
            if(isset($_GET['tableView'])){
                
                // i want to select where 01-06-2023 month is paid
                $resident = Resident::Join('users','residents.user_id','=','users.id')
                ->join('houses','residents.house_id','=','houses.id')
                ->get()
                ->map(function($item){
                    $payments = Payment::where('house_id',$item->house_id)->get();
                    foreach(config('global.months') as $key => $value){
                        if($key == "All"){
                            $item->$key = "Not Paid";
                            continue;
                        }else{
                            $item->$key = "Not Paid";
                            foreach($payments as $payment){
                                if($key == $payment->billingmonth){
                                    // dump($payment->billingmonth);
                                    $item->All = "Paid";
                                    $item->$key = "Paid";
                                }
                            }
                        }
                    }
                    return $item;
                });
                
                if(isset($_GET['month'])){
                    if($_GET['month'] != 'All'){
                        $resident = $resident->where($_GET['month'],'Paid');
                    }
                }

                if(isset($_GET['unpaid'])){
                    $resident = $resident->where($_GET['unpaid'],'Not Paid');
                }
                
                $payments = Payment::Monthlyfilter(Carbon::now()->startOfMonth()->format('d-m-Y'))->pluck('id')->toarray();
                $payments = Payment::sortedData($payments)->get();
                // dd($payments);
                $count = $payments->count();
                $sum = $payments->sum('amount');
                
                // dd($resident->first());

            }else{
                $payments = Payment::Monthlyfilter(Carbon::now()->startOfMonth()->format('d-m-Y'))->pluck('id')->toarray();
                $payments = Payment::sortedData($payments)->get();
                // dd($payments->first());
                $count = $payments->count();
                $sum = $payments->sum('amount');
            }
            
        }
        
        $payments->map(function($payment){
            if(!$payment->resident_type){
                $residentType = House::where('id',$payment->house_id)->first()->resident_type;
                $payment->resident_type = $residentType;
            }
            return $payment;
        });
        
        if(isset($_GET['resident_type'])){
            $payments = $payments->where('resident_type',$_GET['resident_type']);
            if(isset($resident)){
                $resident = $resident->where('resident_type',$_GET['resident_type']);
            }
        }
        
        return view('payments.index', compact('payments', 'months', 'count', 'sum', 'id', 'resident'));
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
        $residentType = [1 => 'non commercial', 2 => 'commercial'];
        $paymentType = [1 => 'monthly',2 => 'six_months',3 => 'twelve_months'];
        $house = House::where('id',$req->house_id)->first()->resident_type;
        $amount = PaymentType::where('resident_type',$residentType[$house])->first();
        $initialMonth = $amount->initial_month;
        if($paymentType[$req->payment_modes_id] == 'monthly'){
            $monthly = $amount->monthly;
        }elseif($paymentType[$req->payment_modes_id] == 'six_months'){
            $monthly = $amount->six_months;
        }elseif($paymentType[$req->payment_modes_id] == 'twelve_months'){
            $monthly = $amount->twelve_months;
        }
        $this->initialpayment = $initialMonth;
        $this->monthlypayment = $monthly;
        // dd($this->initialpayment, $this->monthlypayment);
        

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
                $payment=Payment::create([

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
                            $payment=Payment::create([

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
                    $payment=Payment::create([
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
            $payment->update([
                'payment_modes_id' => $req['payment_modes_id'],
                'dateofdeposit' => Carbon::parse($req->dateofdeposit)->format('d-m-Y'),
                'comments' => $req['comments']
            ]);

            return redirect()->route('payments.index')->with('success', 'Payment Edited Succesfully');
        }

        $payment->update([
            'house_id' => $req['house_id'],
            'billingmonth' => $req['billingmonth'],
            'payment_modes_id' => $req->payment_modes_id,
            'dateofdeposit' => Carbon::parse($req->dateofdeposit)->format('d-m-Y'),
            'comments' => $req['comments']
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment Edited Succesfully');
    }

    public function destroy(Payment $payment)
    {
        abort_if(auth()->user()->usertype_id != User::ADMIN, 403, 'Access Deined');

        $payment->delete();

        return back()->with('success','payment deleted successfully');
    }

    public function ajax(Request $request)
    {
        $houseId = $request->input('house_id');
        $house = null;
        if($houseId){
            $house = House::where('id', $houseId)->first();
        }
        $payments = Payment::where('house_id', $houseId)
        ->with('paymentmode')
        ->get()
        ->map(function ($payment) {
        return [
            'name' => $payment->paymentmode->name,
            'billingmonth' => $payment->billingmonth,
            'dateofdeposit' => $payment->dateofdeposit,
        ];
        
    });
    

        $payments = collect($payments)->toArray();

        return response()->json([
            'payments' => isset($payments[0]) ? $payments : null,
            'resident_type' => $house ? $house->resident_type : null,
        ]);
    }

    public function getAmount(Request $request){
        $residentType = [1 => 'non commercial', 2 => 'commercial'];
        $paymentType = [1 => 'monthly',2 => 'six_months',3 => 'twelve_months'];
        $amount = PaymentType::where('resident_type',$residentType[$request->residentType])->first();
        
        $initialMonth = $amount->initial_month; 
        if($paymentType[$request->paymentType] == 'monthly'){
            $monthly = $amount->monthly;
        }elseif($paymentType[$request->paymentType] == 'six_months'){
            $monthly = $amount->six_months;
        }elseif($paymentType[$request->paymentType] == 'twelve_months'){
            $monthly = $amount->twelve_months;
        }

        return response()->json([
            'initialMonth' => $initialMonth,
            'monthly' => $monthly
        ]);
    }

}
