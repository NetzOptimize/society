@extends('layouts.main')
@section('title')
Society Houses Show
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class=" main-details1 w-100 main d-flex justify-content-center align-items-center text-dark mt-5 pt-5" id="main-details1">
        <div class="main-details rounded bg-light p-4 ">

            @if (auth()->user()->usertype_id != 3)
            <div class="resident-create mt-3 p-3 me-5 d-flex justify-content-end">
                <a href="{{ route('residents.create', $house->id) }}" class="btn btn-success d-flex align-items-center"> Add Resident</a>
            </div>
            @endif

            <div class="detail-heading text-center ">
                <h3>Details of House {{ $house->full_address }}</h3>
            </div>
            <div class="details mt-3">
                <div class="owner-details">
                    <h4>Owner Of The House</h4>
                    <div class="table-owner table-responsive">
                        <table class="table table-hover table-bordered   ">
                            @if($owner)
                            <thead>
                                <tr>
                                    <th scope="col">Serial No.</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col"> Mobile 1:</th>
                                    <th scope="col">Mobile 2:</th>
                                    @if (auth()->user()->usertype_id != 3)
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>

                            </thead>
                            <tbody>
                                @if ($owner)
                                <tr>
                                    <td>1</td>
                                    <td> {{ $owner->name }}
                                    </td>
                                    <td> {{ $owner->mobile1 }}
                                    </td>
                                    <td> {{ $owner->mobile2 }}</td>
                                    @if (auth()->user()->usertype_id != 3)
                                    <td class="text-center"><a href="{{ route('users.edit', $owner) }}" class="btn btn-success">Edit</a></td>
                                    @endif
                                </tr>
                                @endif
                            </tbody>
                            @else
                            <div class="error">No Record Found</div>
                            @endif
                        </table>
                    </div>
                </div>
                <!-- tenants -->
                <div class="tenants ">
                    <h4>Tenants Of The House</h4>
                    <div class="table-tenants table-responsive">
                        <table class="table table-hover table-bordered  ">
                            @if (isset($tenants[0]))
                            <thead>
                                <tr>
                                    <th scope="col">Serial No.</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col"> Mobile 1:</th>
                                    <th scope="col">Mobile 2:</th>
                                    @if (auth()->user()->usertype_id != 3)
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($tenants as $tenant)
                                <tr>
                                    @php
                                    $i++;
                                    @endphp
                                    <td>@php echo $i; @endphp </td>
                                    <td> {{ $tenant['name'] }}
                                    </td>
                                    <td>{{ $tenant['mobile1'] }}
                                    </td>
                                    <td> {{ $tenant['mobile2'] }}
                                    </td>
                                    @if (auth()->user()->usertype_id != 3)
                                        <td class="text-center"><a href="{{ route('users.edit', $tenant) }}" class="btn btn-success">Edit</a></td>
                                    @endif
                                </tr>
                                @endforeach
                                @else
                                <div class="error">No Record Found</div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="main-details-house me-5 ms-5">


        <div class="tenant-table table-hover table-bordered mt-5">
            <div class="table table-responsive">
                <h4>Payment Details :</h4>
                <table class="table table-light table-bordered table-hover">
                    @if($payments->first())
                    <thead>
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Month</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date Of Deposit</th>
                            <th scope="col">Mode of Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($payments->first())
                        <tr>
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($payments as $payment)
                            @php
                            $i++;
                            @endphp
                            <td>@php echo $i; @endphp </td>
                            <td>{{ $payment->billingmonth }} </td>
                            <td>{{ $payment->amount }} </td>
                            <td>{{ $payment->dateofdeposit }} </td>
                            <td>{{ $payment->paymentmode->name }} </td>
                        </tr>
                        @endforeach
                        @endif
                        @else
                        <div class="error">No Record Found</div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<a href="{{ route('houses.index') }}" class="btn btn-dark flex-row-reverse">Cancel</a>
</html>
@endsection
