<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Structure</title>
    <style>
        .paid{
            background-color:darkgreen !important;
        }
        td,
        th {
            font-weight: 300;
        }

        table {
            border-collapse: collapse;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid black;
        }

        .structure-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .left-tables,
        .right-tables {
            width: 45%;
        }

        .table-item {
            margin-top: 20px;
        }

        .right-tables .table-item:nth-child(3) {
            margin-top: 40px;
        }

        .left-tables .table-item:first-child table tr:first-child th:first-child,
        .right-tables .table-item:first-child table tr:first-child th:first-child {
            background-color: #86ad61;
        }

        tr {
            text-align: center;
            vertical-align: middle;
            background-color: #d4811b;
        }

        .left-tables th,
        tr td {
            background-color: #d4811b;
        }

        .right-tables tr th,
        .right-tables tr td,
        .left-tables .table-item:first-child tr td,
        .left-tables .table-item:first-child tr th,
        .left-tables .table-item th:last-child,
        .left-tables .table-item td:last-child,
        .left-tables .table-item:last-child tr th {
            background-color: #9fc6e9;
        }

        .right-tables .table-item:nth-child(2) td,
        .right-tables .table-item:nth-child(2) td {
            width: 20%;
        }

        .right-tables .table-item:last-child tr:first-child {
            background-color: #d4811b;
        }

        .right-tables .table-item:last-child td:nth-child(1) {
            background-color: #9da1a6;
        }

    </style>
</head>
<body>
    <select name="month" id="month">
        <option>Select Month</option>
        @foreach ($months as $key => $month)
            <option value="{{ $key }}">{{ $month }}</option>
        @endforeach
    </select>
    <section class="structure">
        <div class="container">
            <div class="structure-container">
                <div class="left-tables">
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th colspan="7" rowspan="7" style="width: 86.5%;">PARK 1</th>
                                <td id="DS-A-1">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-2">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-3">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-4">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-5">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-6">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-7">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--1">GB</th>
                                <th id="GB--2">GB</th>
                                <th id="GB--3">GB</th>
                                <th id="GB--4">GB</th>
                                <th id="GB--5">GB</th>
                                <th id="GB--6">GB</th>
                                <th id="DS-C-19">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--8">GB</td>
                                <td id="GB--9">GB</td>
                                <td id="GB--10">GB</td>
                                <td id="GB--11">GB</td>
                                <td id="GB--12">GB</td>
                                <td id="GB--13">GB</td>
                                <td id="DS-C-20">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--14">GB</th>
                                <th id="GB--15">GB</th>
                                <th id="GB--16">GB</th>
                                <th id="GB--17">GB</th>
                                <th id="GB--18">GB</th>
                                <th id="GB--19">GB</th>
                                <th id="DS-C-21">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--20">GB</td>
                                <td id="GB--21">GB</td>
                                <td id="GB--22">GB</td>
                                <td id="GB--23">GB</td>
                                <td id="GB--24">GB</td>
                                <td id="GB--25">GB</td>
                                <td id="DS-C-22">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--26">GB</th>
                                <th id="GB--27">GB</th>
                                <th id="GB--28">GB</th>
                                <th id="GB--29">GB</th>
                                <th id="GB--30">GB</th>
                                <th id="GB--31">GB</th>
                                <th id="DS-C-23">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--32">GB</td>
                                <td id="GB--33">GB</td>
                                <td id="GB--34">GB</td>
                                <td id="GB--35">GB</td>
                                <td id="GB--36">GB</td>
                                <td id="GB--37">GB</td>
                                <td id="DS-C-24">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--38">GB</th>
                                <th id="GB--39">GB</th>
                                <th id="GB--40">GB</th>
                                <th id="GB--41">GB</th>
                                <th id="GB--42">GB</th>
                                <th id="GB--43">GB</th>
                                <th id="DS-C-25">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--44">GB</td>
                                <td id="GB--45">GB</td>
                                <td id="GB--46">GB</td>
                                <td id="GB--47">GB</td>
                                <td id="GB--48">GB</td>
                                <td id="GB--49">GB</td>
                                <td id="DS-C-26">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--50">GB</th>
                                <th id="GB--51">GB</th>
                                <th id="GB--52">GB</th>
                                <th id="GB--53">GB</th>
                                <th id="GB--54">GB</th>
                                <th id="GB--55">GB</th>
                                <th id="DS-C-27">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--56">GB</td>
                                <td id="GB--57">GB</td>
                                <td id="GB--58">GB</td>
                                <td id="GB--59">GB</td>
                                <td id="GB--60">GB</td>
                                <td id="GB--61">GB</td>
                                <td id="DS-C-28">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--62">GB</th>
                                <th id="GB--63">GB</th>
                                <th id="GB--64">GB</th>
                                <th id="GB--65">GB</th>
                                <th id="GB--66">GB</th>
                                <th id="GB--67">GB</th>
                                <th id="DS-C-29">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--68">GB</td>
                                <td id="GB--69">GB</td>
                                <td id="GB--70">GB</td>
                                <td id="GB--71">GB</td>
                                <td id="GB--72">GB</td>
                                <td id="GB--73">GB</td>
                                <td id="DS-C-30">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="GB--74">GB</th>
                                <th id="GB--75">GB</th>
                                <th id="GB--76">GB</th>
                                <th id="GB--77">GB</th>
                                <th id="GB--78">GB</th>
                                <th id="GB--79">GB</th>
                                <th id="DS-C-31">DS</th>
                            </tr>
                            <tr>
                                <td id="GB--80">GB</td>
                                <td id="GB--81">GB</td>
                                <td id="GB--82">GB</td>
                                <td id="GB--83">GB</td>
                                <td id="GB--84">GB</td>
                                <td id="">GB</td>
                                <td id="DS-C-32">DS</td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="DS-A-8">DS</th>
                                <th id="DS-A-9">DS</th>
                                <th id="DS-A-10">DS</th>
                                <th id="DS-A-11">DS</th>
                                <th id="DS-A-12">DS</th>
                                <th id="DS-A-13">DS</th>
                                <td id="DS-A-14">DS</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="right-tables">
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th colspan="3" rowspan="3" style="width: 80%;">PARK 2</th>
                                <th id="DS-A-15">DS</th>
                            </tr>
                            <tr>

                                <td id="DS-A-16 1">DS</td>
                            </tr>
                            <tr>

                                <td id="DS-A-16 2">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item" style="margin-top: 0;">
                        <table style="width:100%;">
                            <tr>
                                <th style="border-top: 0;" id="DS-A-17">DS</th>
                                <th rowspan="8" style="background-color: #ffffff; border-bottom-color: transparent; border-top: 0;"></th>
                                <th style="border-top: 0;" id="DS-A-18">DS</th>
                                <th rowspan="8" style="background-color: #ffffff; border-bottom-color: transparent; border-top: 0;"></th>
                                <th style="border-top: 0;" id="DS-A-19">DS</th>
                            </tr>
                            <tr>
                                <td id="DS-A-20">DS</td>

                                <td id="DS-A-21">DS</td>

                                <td id="DS-A-22">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-A-23">DS</td>

                                <td id="DS-A-24">DS</td>

                                <td id="DS-B-25">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-B-26">DS</td>

                                <td id="DS-B-27">DS</td>

                                <td id="DS-B-28">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-B-29">DS</td>

                                <td id="DS-B-30">DS</td>

                                <td id="DS-B-31">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-B-32">DS</td>

                                <td id="DS-B-33">DS</td>

                                <td id="DS-B-34">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-B-35">DS</td>

                                <td id="DS-B-36">DS</td>

                                <td id="DS-B-37">DS</td>
                            </tr>
                            <tr>
                                <td id="DS-B-38">DS</td>

                                <td id="DS-B-39">DS</td>

                                <td id="DS-B-40">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="DS-B-41">DS</th>
                                <th id="DS-B-42">DS</th>
                                <th id="DS-B-43">DS</th>
                                <th id="DS-B-44">DS</th>
                                <th id="DS-B-45">DS</th>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="DS-B-46">DS</th>
                                <th id="DS-B-47">DS</th>
                                <th id="DS-B-48">DS</th>
                                <th id="DS-B-49">DS</th>
                                <th id="DS-B-50">DS</th>
                            </tr>
                            <tr>
                                <td id="DS-B-51">DS</td>
                                <td id="DS-B-52">DS</td>
                                <td id="DS-C-1">DS</td>
                                <td id="DS-C-2">DS</td>
                                <td id="DS-C-3">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="DS-C-4">DS</th>
                                <th id="DS-C-5">DS</th>
                                <th id="DS-C-6">DS</th>
                                <th id="DS-C-7">DS</th>
                                <th id="DS-C-8">DS</th>
                            </tr>
                            <tr>
                                <td id="DS-C-9">DS</td>
                                <td id="DS-C-10">DS</td>
                                <td id="DS-C-11">DS</td>
                                <td id="DS-C-12">DS</td>
                                <td id="DS-C-13">DS</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-item">
                        <table style="width:100%">
                            <tr>
                                <th id="DS-C-14">DS</th>
                                <th id="DS-C-15">DS</th>
                                <th id="DS-C-16">DS</th>
                                <th id="DS-C-17">DS</th>
                                <th id="DS-C-18">DS</th>
                            </tr>
                            <tr>
                                <td style="height: 26px;" id="MS--1">MS</td>
                                <td rowspan="7" colspan="5" style="border:0; background-color:#ffffff;"></td>
                            </tr>
                            <tr>
                                <td id="MS--2">MS</td>
                            </tr>
                            <tr>
                                <td id="MS-A-2">MS</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td id="MS--3">MS</td>
                            </tr>
                            <tr>
                                <td id="MS--4">MS</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td id="MS--5">MS</td>
                            </tr>
                            <tr style="height: 26px;">
                                <td id="MS--6">MS</td>
                            </tr>
                            <tr>
                                <td id="MS--7">MS</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#month').on('change', function() {
           $('td,th').removeClass("paid");
            var month = $(this).val();
            $.ajax({
                url: "{{ url('/report/data') }}",
                type: 'POST',
                data: {
                    "_token": " {{ csrf_token() }}",
                    month : month,
                },
                dataType: 'json',
                success: function(response) {

                    var houses = response.houses;

                    $.each(houses, function(index, house) {
                        console.log(house.full_address)
                        $("#"+house.full_address).addClass("paid");
                });

                },
                error: function() {
                    console.log('Error occurred. Please try again.');
                }
            });
        });
    });

</script>


</html>



