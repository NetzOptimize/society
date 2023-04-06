@include('navbar')
@extends('layouts.main')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
<body>
    <div class=" main-details1 w-100 main d-flex justify-content-center align-items-center text-success " id="main-details1">
        <div class="main-details w-50 rounded bg-light p-4 ">

            <div class="detail-heading text-center ">
                <h3>Details of House {{ $house->full_address }}</h3>

            </div>

            <div class="details">
                <div class="owner-details">
                    <h4>Owner Of The House</h4>

                    <table class="table table-hover table-bordered w-50   ">
                        <thead>
                            @if ($owner)
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col"> Mobile 1:</th>
                                <th scope="col">Mobile 2:</th>
                            </tr>
                            @endif
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $owner->name }}
                                </td>
                                <td> {{ $owner->mobile1 }}
                                </td>
                                <td> {{ $owner->mobile2 }}</td>
                            </tr>
                        </tbody>

                    </table>

                <div class="detail-heading text-center ">
                    <h3>Details of House {{ $house->full_address }}</h3>
                </div>
                <div class="details">
                    <div class="owner-details">
                        <h4>Owner Of The House</h4>

                        <table class="table table-hover table-bordered w-50   ">
                            <thead>
                                @if ($owner)
                                    <tr>
                                        <th scope="col">Serial No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"> Mobile 1:</th>
                                        <th scope="col">Mobile 2:</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> {{ $owner->name }}
                                    </td>
                                    <td> {{ $owner->mobile1 }}
                                    </td>
                                    <td> {{ $owner->mobile2 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- tenants -->
                    <div class="tenants ">
                        <h4>Tenants Of The House</h4>
                        <table class="table table-hover table-bordered w-50">
                            <thead>
                                <tr>
                                    <th scope="col">Serial No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"> Mobile 1:</th>
                                    <th scope="col">Mobile 2:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($owner)
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
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tenant-table table-hover table-bordered mt-5">
                    <div class="table">

                        <table class="table table-active table-striped">

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
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>
