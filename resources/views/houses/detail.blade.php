<h3>Details of House {{ $house->full_address }}</h3>

<h2>Owner Of The House</h2>
@if ($owner)
    Name:{{ $owner->name }}
    Mobile 1: {{ $owner->mobile1 }}
    Mobile 2: {{ $owner->mobile2 }}
@endif
<h2>Tenants Of The House</h2>

@if ($tenants)
    @foreach ($tenants as $tenant)
        Name:{{ $tenant['name'] }}
        Mobile 1: {{ $tenant['mobile1'] }}
        Mobile 2: {{ $tenant['mobile2'] }}
    @endforeach
@endif
{{-- payment listing --}}
<table>
    <tr>

        <th>
            SERIAL NNO.
        </th>
        <th>
            PAYMENT MONTH
        </th>
        <th>
            AMOUNT
        </th>
        <th>
            DATE OF DEPOSIT
        </th>
        <th>
            MODE OF PAYMENT
        </th>
    </tr>
    @if ($payments->first())
        <tr>
            @php
                $i = 0;
            @endphp
            @foreach ($payments as $payment)
                @php
                    $i++;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $payment->billingmonth }}</td>

                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->dateofdeposit }}</td>
                <td>{{ $payment->paymentmode->name }}</td>
        </tr>
    @endforeach
    @endif

</table>
