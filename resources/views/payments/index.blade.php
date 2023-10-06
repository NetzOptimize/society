@extends('layouts.main')
@php
    if(request('start'))
    {
        $start = "01-".request('start');

        $end = "01-".request('end');
    }
@endphp
@section('title')
Society Payments
@endsection
@section('content')
{{-- monthwise filter --}}


<div class="heading-payment-history bg-light me-5 ms-5  p-4 mt-3 text-center">
    <h3>Payment History</h3>
</div>
    
    
    <div class="d-flex justify-content-center align-items-center  p-4 payment1 ">
        
        <div class="paid-month-flex d-flex me-3">
            <div class="dropdown me-2" >
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (request('resident_type'))
                    Resident Type - {{request('resident_type') == 1 ? "Non Commercial" : "Commercial"  }}
                    @else
                    Resident Type - All
                    @endif
                </label>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?{{request('tableView') ? "tableView=All" : "" }}{{request('month') ? "&month=".request('month') : "" }}{{request('unpaid') ? "&unpaid=".request("unpaid") : ""}}{{request("start") ? "&start=".request("start") : "" }}{{request("end") ? "&end=".request("end") : "" }}">All</a></li>
                    @if(request('tableView'))
                    <li><a class="dropdown-item" href="?tableView=All&resident_type=1{{request('month') ? "&month=".request('month') : "" }}{{request('unpaid') ? "&unpaid=".request("unpaid") : ""}}{{request("start") ? "&start=".request("start") : "" }}{{request("end") ? "&end=".request("end") : "" }}">Non Commercial</a></li>
                    <li><a class="dropdown-item" href="?tableView=All&resident_type=2{{request('month') ? "&month=".request('month') : "" }}{{request('unpaid') ? "&unpaid=".request("unpaid") : ""}}{{request("start") ? "&start=".request("start") : "" }}{{request("end") ? "&end=".request("end") : "" }}" >Commercial</a></li>
                    @else
                    <li><a class="dropdown-item" href="?resident_type=1{{request('month') ? "&month=".request('month') : "" }}{{request('unpaid') ? "&unpaid=".request("unpaid") : ""}}">Non Commercial</a></li>
                    <li><a class="dropdown-item" href="?resident_type=2{{request('month') ? "&month=".request('month') : "" }}{{request('unpaid') ? "&unpaid=".request("unpaid") : ""}}" >Commercial</a></li>
                    @endif
                </ul>

            </div>
            @if(request('month'))
            <div class="dropdown me-2">
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (request('month') || request('unpaid'))
                        {{ request('month') }}
                        {{ request('unpaid') }}
                    @else
                
                    Months
            @endif
                </label>
                <ul class="dropdown-menu">
                    @foreach ($months as $key => $month)
                    @if(request('tableView'))
                    @if($key != "All" && $key !="init")
                        <li><a class="dropdown-item" href="{{route('payments.index')}}?tableView=All&month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "&start=03-2023" }}{{"&end=".DateTime::createFromFormat('d-m-Y',$key)->format('m-Y')}}">{{ $month }}</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{route('payments.index')}}?tableView=All&month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "&start=03-2023" }}{{"&end=12-2024" }}">{{ $month }}</a></li>
                    @endif
                    @else
                        <li><a class="dropdown-item" href="{{ route('payments.index') }}?month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}">{{ $month }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @else
            <div class="dropdown me-2 none">
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (request('month') || request('unpaid'))
                    {{ request('month') }}
                    {{ request('unpaid') }}
                    @else
                    Months
                    @endif
                </label>
                <ul class="dropdown-menu">
                    @foreach ($months as $key => $month)
                    @if(request('tableView'))
                    @if($key != "All" && $key !="init")
                        <li><a class="dropdown-item" href="{{route('payments.index')}}?tableView=All&month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "&start=03-2023" }}{{"&end=".DateTime::createFromFormat('d-m-Y',$key)->format('m-Y')}}">{{ $month }}</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{route('payments.index')}}?tableView=All&month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "&start=03-2023" }}{{"&end=12-2024" }}">{{ $month }}</a></li>
                    @endif
                    @else
                        <li><a class="dropdown-item" href="{{ route('payments.index') }}?month={{ $key }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}">{{ $month }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endif

            @if(request('tableView'))
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start" placeholder="Start Date" value="{{isset($_GET['start']) ? $_GET['start'] : "03-2023"}}"/>
                <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                </div>
                <input type="text" class="form-control" name="end" placeholder="End Date"  value="{{isset($_GET['end']) ? $_GET['end'] : date("m-Y")}}"/>
                {{-- bootstrap sort button --}}
                <a href="" class="btn btn-success d-flex align-items-center me-2" id="sortDate">Sort</a>
            </div>
            @endif

            


            <div class="none">
            <div class="dropdown">
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (request('unpaid'))
                    Unpaid
                    @else
                    Paid
                    @endif
                </label>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @if (request('tableView'))
                            href="{{route('payments.index')}}?tableView=All&month={{ request('month') }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "" }}{{request("end") ? "&end=".request("end") : "" }}"
                        @else    
                            href="{{ route('payments.index') }}?month={{ request('unpaid') }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}"@endif>Paid</a></li>
                            
                    @if (request('month'))
                    <li><a class="dropdown-item" @if(request('tableView')) 
                        href="{{route('payments.index')}}?tableView=All&unpaid={{ request('month') }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}{{request("start") ? "&start=".request("start") : "" }}{{request("end") ? "&end=".request("end") : "" }}"
                        @else
                        href="{{ route('payments.index') }}?unpaid={{ request('month') }}{{ request('resident_type') ? "&resident_type=".request('resident_type') : "" }}" @endif >Unpaid</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

       
        @if (!request('tableView'))
            
        
        {{-- datewise filter --}}
        @if(request('start_date'))
            <div class="payment ">
                <form action="" method="GET" style="margin:0" id="payment-history-form">
                    <label class="ms-3 me-3 text-center"><b>Date of deposit (SD)</b></label>
                    @if (request('start_date'))
                    <input type="date" name="start_date" value={{ request('start_date') }}>
                    @else
                    <input type="date" name="start_date" class="start-date" value="{{ old('start_date') }}">
                    @endif
                    <label class="ms-3 me-3 text-center"><b>Date of deposit (ED)</b></label>
                    @if (request('end_date'))
                    <input type="date" name="end_date" value={{ request('end_date') }}>
                    @else
                    <input type="date" class="me-3" name="end_date" id="end-date">
                    @endif
                    <div class="none">
                    <button class="btn btn-success me-3" type="submit" id="filter">Filter</button>
                    </div>
                </form>
            </div>
        @else
        <div class="payment none">
            <form action="" method="GET" style="margin:0" id="payment-history-form">
                <label class="ms-3 me-3 text-center"><b>Date of deposit (SD)</b></label>
                @if (request('start_date'))
                <input type="date" name="start_date" value={{ request('start_date') }}>
                @else
                <input type="date" name="start_date" class="start-date">
                @endif
                <label class="ms-3 me-3 text-center"><b>Date of deposit (ED)</b></label>
                @if (request('end_date'))
                <input type="date" name="end_date" value={{ request('end_date') }}>
                @else
                <input type="date" class="me-3" name="end_date" id="end-date">
                @endif
                <div class="none">
                <button class="btn btn-success me-3" type="submit" id="filter">Filter</button>
                </div>
            </form>
        </div>
        @endif
        @endif

        {{-- search bar --}}
        <div class="none" style="text-align: center">
        <input type="textbox" id="search" placeholder="Search" class="search">
        </div>
    </div>

    {{-- refresh button --}}
    <div class="none">
    <div class="refresh-button pb-4 me-5 d-flex justify-content-end">
        <a @if(request('tableView')) href="{{ route('payments.index') }}?tableView=All&start=03-2023&end={{date('m-Y')}}"  @else href="{{ route('payments.index') }}" @endif class="btn btn-success d-flex align-items-center me-2">Refresh</a>
        <button onclick="printDiv()" class="btn btn-success d-flex align-items-center me-2">Print</button>
        @if (request('tableView'))
        <a href="{{route('payments.index')}}" class="btn btn-success d-flex align-items-center me-2">View By: Payment Recieved</a>
        @else
        <a href="?tableView=All&start=03-2023&end={{date('m-Y')}}" class="btn btn-success d-flex align-items-center me-2">View By: Payments by Residents </a>
        @endif

    </div>
    </div>
<!-- table -->
<div class="reports d-flex justify-content-end me-5">
    <table class="table w-auto table-bordered ">

        <tr>
            <th class="text-center table-info" colspan="2">Financial Reports {{ request('month') && request('month') != "All" && request('month') != "init"  ? "[".date('F', strtotime(request('month')))."]" : (!request('month') && request('end') && request('start') ? "[".date('F-Y',strtotime($start))." to ".date('F-Y',strtotime($end))."]" : "" ) }}</th>
        </tr>

        <tbody>
            {{-- <tr class="table-light">
                <td>Date</td>
                <td>{{ date('d-m-Y') }}</td>
            </tr> --}}
            <tr class="table-light">
                <td>Count</td>
                <td>{{ $count }}</td>
            </tr>
            <tr class="table-light">
                <td>Total Amount</td>
                <td>{{ $sum }}</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- table end -->

{{-- listing  --}}

@php $i=0; @endphp
<div class="table-payments ps-5 pe-5 pt-2 table-responsive">
    <div id="printableArea">
        @if(!isset($_GET['tableView']))
        <table class="table table-light table-bordered table-hover data" id="print-table">
            <thead>
                @if($payments->first())
                <tr class="table-dark">
                    <th>Serial No</th>
                    <th>House No.</th>
                    <th>Billing Month</th>
                    <th>Owner</th>
                    @if (null == request('unpaid'))
                    <th>Payment Mode</th>
                    <th class="d-flex align-items-center ">Date Of Deposit<div class="dropdown ms-2"> 
                            <a class="btn btn-success btn-sm dropdown-toggle none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (request('sort'))
                                {{ request('sort') }}
                                @else
                                Order By
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li class=""><a class="dropdown-item " href="?sort=Ascending&month={{ request('month') }}&start_date={{ request('start_date') }}&end_date={{ request('end_date') }}">Ascending</a></li>
                                {{-- <li class=""><a class="dropdown-item " href="?sort=Ascending&month={{ request('month') }}">Ascending</a></li> --}}
                                <li class=""><a class="dropdown-item " href="?sort=Descending&month={{ request('month') }}&start_date={{ request('start_date') }}&end_date={{ request('end_date') }}">Descending</a></li>
                            </ul>
                        </div>
                    </th>
                    <th>Amount</th>
                    <th>Comment</th>
                    <th>Done By</th>
                    @if (auth()->user()->usertype_id != 3)
                    <div class="none">
                        <th colspan="2" class="text-center none" id="th-payment-print">Actions</th>
                        @endif
                    </div>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (request('unpaid'))
                    @foreach ($payments as $payment)
                    @php
                    $i++;
                    @endphp
                    <td>@php echo $i; @endphp</td>
                    <td>{{ $payment->full_address }}</td>
                    <td>{{ request('unpaid') }}</td>
                    @if(isset($payment->detail))
                    <td>{{ $payment->detail->name }}<br><small class="text-muted">{{ $payment->detail->mobile1 }}</small></td>
                    @else
                    <td>N/A</td>
                    @endif
                </tr>
                @endforeach
                @else
                @foreach ($payments as $payment)
                @php
                $i++;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $payment->houses->full_address }}</td>
                @foreach ($months as $key => $month)
                @if ($key == $payment->billingmonth)
                <td>{{ $month }}</td>
                @endif
                @endforeach
                @if(isset($payment->owner))
                <td>{{ $payment->owner->name }}<br><small class="text-muted">{{ $payment->owner->mobile1 }}</small></td>
                @else
                <td>N/A</td>
                @endif
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit }}</td>
                <td>{{ $payment->amount }}</td>
                @if($payment->comments)
                <td>{{ $payment->comments }}</td>
                @else
                <td>Not Provided</td>
                @endif
                <td >
                    {{ $payment->doneby ? $payment->doneby->value('name'): null }}
                </td>
                <div class="none">
                    @if (auth()->user()->usertype_id == 1)
                    <td class="none">
                        <a href="{{ route('payments.edit', $payment) }}" class="btn btn-success none">Edit</a>
                    </td>
                    <td class="none">
                        <form method="POST" action="{{ route('payments.destroy', $payment->id) }}" class="m-0">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm none" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                    </td>
                    @endif
                    </tr>
                    @endforeach
                    @endif
                    @else
                    <div class="error d-flex justify-content-center "><b>No Record Found</b></div>
                    @endif
                </div>
            </tbody>
        </table>
        @else
            <table class="table table-light table-bordered table-hover data" id="print-table">
            <thead class="table-dark">
                <tr>
                    <th>
                        Serial No
                    </th>
                    <th>
                        House No
                    </th>
                    <th>
                        Owner
                    </th>
                    @foreach ($months as $key => $month)
                    
                    @if(isset($start) && isset($end))
                            @if($key == "All")
                                @continue
                            @endif
                            @if($key != "init")
                            @if (strtotime($key)<strtotime($start) || strtotime($key)>strtotime($end))
                                @continue
                            @endif
                            @endif
                            
                        @else
                            @if ($key == "All" ||  strtotime($key)>strtotime(date("d-m-Y")))
                                @continue
                            @endif
                        @endif
                    <th>
                        {{ $month }}
                    </th>

                    @endforeach
                    
                </tr>
            </thead>
            @php
                $i=1;
            @endphp
            <tbody>
                {{-- {{dd($resident->first())}} --}}
                @foreach ($resident ?? [] as $residentPayment)
                <tr>
                    <td>
                        {{$i++}}
                    </td>
                    <td>
                        {{$residentPayment->full_address}}
                    </td>
                    <td>
                        {{$residentPayment->name}}
                    </td>
                    @foreach ($months as $key => $month)
                        @if(isset($start) && isset($end))
                            @if($key == "All")
                                @continue
                            @endif
                            @if($key != "init")
                            @if (strtotime($key)<strtotime($start) || strtotime($key)>strtotime($end))
                                @continue
                            @endif
                            @endif
                            
                        @else
                            @if ($key == "All" ||  strtotime($key)>strtotime(date("d-m-Y")))
                                @continue
                            @endif
                        @endif
                        @php
                            
                        @endphp
                        <td @if ($residentPayment[$key] == "Not Paid")
                            style="color:red;"
                            @elseif ($residentPayment[$key]["status"] == "Paid")
                            style="color:green;"
                        @endif >
                            {{isset($residentPayment[$key]["status"]) ? $residentPayment[$key]["status"] : $residentPayment[$key]}}
                            <br>
                            {{isset($residentPayment[$key]["amount"]) ? "(".$residentPayment[$key]["amount"].")" : ""}}
                        </td>
                    @endforeach
                </tr>

                    
                @endforeach
            </tbody>
        </table>
        {{-- <table id="header-fixed" ></table> --}}
        @endif
    </div>
</div>
{{-- delete confirmation --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('#sortDate').click(function(e) {
        e.preventDefault();
        var start_date = $('input[name="start"]').val();
        var end_date = $('input[name="end"]').val();
        // var month = "{{ request('month') ? request('month') : '' }}";
        var resident_type = "{{ request('resident_type') ? request('resident_type') : '' }}";
        var unpaid = "{{ request('unpaid') ? request('unpaid') : '' }}";
        var tableView = "{{ request('tableView') ? request('tableView') : '' }}";
        if (start_date == '' || end_date == '') {
            alert('Please select both dates');
            return false;
        }
        var url = "{{ route('payments.index') }}?start=" + start_date + "&end=" + end_date;
        // if (month) {
        //     url += "&month=" + month;
        // }
        if (resident_type) {
            url += "&resident_type=" + resident_type;
        }
        if (unpaid) {
            url += "&unpaid=" + unpaid;
        }
        if (tableView) {
            url += "&tableView=" + tableView;
        }
        
        location.replace(url);

        
    });

    $(document).ready(function(){
        $('#datepicker').datepicker({
            format: 'mm-yyyy', // specify the date format
            autoclose: true,
            todayHighlight: true,
            startDate: '03-2023'
        });
    });
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Do You Want To Delete This?`
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

    // for data printing
    function printDiv() {
        $(".hide").hide();
        setTimeout(function() {
            window.print();
            setTimeout(function() {
                $(".hide").show();
            }, 400);
        }, 400);
    }

    // searching
    $(document).ready(function() {
        $("#search").keyup(function() {
            var value = $(this).val().toLowerCase();
            $(".data tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
