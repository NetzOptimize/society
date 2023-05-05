@extends('layouts.main')
@section('title')
Society Report
@endsection
@section('content')
    <style>
          .paid{
            background-color:darkgreen !important;
        }
        * {
          box-sizing: border-box;
        }
        p{
            margin: 0;
            padding: 0;
            font-size: 13px;
            font-family: 'Verdana', sans-serif;
        }
        .container{
            max-width: 1500px;
            margin:  0 auto;
        }
        .structure-container{
            display: flex;
            align-items: flex-end;
        }
        .left-tables{
            padding-bottom: 4.8rem;
            border-right: 124px solid #ed7d31;
            width: 53%;
        }
        .left-tables,.right-tables{
            width: 50%;
            display: flex;
            flex-direction: column;
        }
        .box{
            display: flex;
            flex-direction: column;
            border-top: 25px solid #ed7d31;
        }
        .table-item{
            display: flex;
            justify-content: space-between;
            height: 100%;
        }
        .table-item:nth-child(2){
            border-bottom: 1px solid;
        }
        .left-tables .table-item .park{
            background-color: #86ad61;
            width: 80%;

        }
        .left-tables .block-list{
            display: flex;
            flex-direction: column;
            width: 20%;
        }
        .left-tables .block-item,.right-tables .block-item{
            border: 1px solid #000000;
            background-color: #f8cbad;
            text-align: center;
            padding: 4px;
            border-bottom: 0;
        }
        .left-tables .g-block{
            display: flex;
            width: 80%;
            background-color: #ffffff;
        }
        .left-tables .g-item{
            border: 1px solid #000000;
            width: 100%;
            border-right: 0;
            border-bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .right-tables .table-item{
            border-right: 1px solid #000000;
        }
        .right-tables .park-list{
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            width: 100%;
            height: 100%;
        }
        .right-tables .park-list .park-block{
            display: flex;
            flex-direction: column;
            background-color: #86ad61;
            width: 100%;
            height: 100%;
        }
        .right-tables .park-list .park-block:first-child{
            width: 25%;
        }
        .right-tables .park-list .park-block:nth-child(2){
            width: 50%;
        }
        .right-tables .park-list .park-block:nth-child(3){
            width: 75%;
        }
        .right-tables .park-list .park-block:last-child{
            width: 100%;
        }
        .right-tables .park-below{
            display: flex;
        }
        .right-tables .block-left{
            display: flex;
            flex-direction: column;
            width: 58%;
        }
        .right-tables .block-right{
            display: flex;
            flex-direction: column;
            width: 29%;
        }
        .right-tables .block-right .block-list{
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .right-tables .park-below .block-list{
            width: 50%;
            display: flex;
            flex-direction: column;
        }
        .right-tables  .block-list{
            display: flex;
            width: 100%;
            height: 100%;
        }
        .right-tables  .block-list:last-child{
            border-bottom: 1px solid #000000;
        }
        .right-tables  .block-list .block-item{
            width: 100%;
            border-right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .right-tables .ms-left{
            display: flex;
            flex-direction: column;
            width: 12%;
        }
        .right-tables .ms-block{
            border: 1px solid #000000;
            background-color: #9fc6e9;
            text-align: center;
            padding: 4px;
            border-bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
                <div class="left-tables" style="padding-bottom: 4.8rem;">
                    <div class="box" style="border-top: 0;">
                        <div class="table-item">
                            <div class="park"></div>
                            <div class="block-list" style="border-bottom: 1px solid #000000;">
                                <div class="block-item" id="DS-C-1"><p>DS-C-1</p></div>
                                <div class="block-item" id="DS-C-2"><p>DS-C-2</p></div>
                                <div class="block-item" id="DS-C-3"><p>DS-C-3</p></div>
                                <div class="block-item" id="DS-C-4"><p>DS-C-4</p></div>
                                <div class="block-item" id="DS-C-5"><p>DS-C-5</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--6"><p>GB--6</p></div>
                                <div class="g-item" id="GB--5"><p>GB--5</p></div>
                                <div class="g-item" id="GB--4"><p>GB--4</p></div>
                                <div class="g-item" id="GB--3"><p>GB--3</p></div>
                                <div class="g-item" id="GB--2"><p>GB--2</p></div>
                                <div class="g-item" id="GB--1"><p>GB--1</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-6"><p>DS-C-6</p></div>
                                <div class="block-item" id="DS-C-7"><p>DS-C-7</p></div>
                                <div class="block-item" id="DS-C-8"><p>DS-C-8</p></div>
                            </div>
                        </div>
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--7"><p>GB--7</p></div>
                                <div class="g-item" id="GB--8"><p>GB--8</p></div>
                                <div class="g-item" id="GB--9"><p>GB--9</p></div>
                                <div class="g-item" id="GB--10"><p>GB--10</p></div>
                                <div class="g-item" id="GB--11"><p>GB--11</p></div>
                                <div class="g-item" id="GB--12"><p>GB--12</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-9"><p>DS-C-9</p></div>
                                <div class="block-item" id="DS-C-10"><p>DS-C-10</p></div>
                                <div class="block-item" id="DS-C-11"><p>DS-C-11</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--18"><p>GB--18</p></div>
                                <div class="g-item" id="GB--17"><p>GB--17</p></div>
                                <div class="g-item" id="GB--16"><p>GB--16</p></div>
                                <div class="g-item" id="GB--15"><p>GB--15</p></div>
                                <div class="g-item" id="GB--14"><p>GB--14</p></div>
                                <div class="g-item" id="GB--13"><p>GB--13</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-12"><p>DS-C-12</p></div>
                                <div class="block-item" id="DS-C-13"><p>DS-C-13</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--19"><p>GB--19</p></div>
                                <div class="g-item" id="GB--20"><p>GB--20</p></div>
                                <div class="g-item" id="GB--21"><p>GB--21</p></div>
                                <div class="g-item" id="GB--22"><p>GB--22</p></div>
                                <div class="g-item" id="GB--23"><p>GB--23</p></div>
                                <div class="g-item" id="GB--24"><p>GB--24</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-14"><p>DS-C-14</p></div>
                                <div class="block-item" id="DS-C-15"><p>DS-C-15</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--30"><p>GB--30</p></div>
                                <div class="g-item" id="GB--29"><p>GB--29</p></div>
                                <div class="g-item" id="GB--28"><p>GB--28</p></div>
                                <div class="g-item" id="GB--27"><p>GB--27</p></div>
                                <div class="g-item" id="GB--26"><p>GB--26</p></div>
                                <div class="g-item" id="GB--25"><p>GB--25</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-16"><p>DS-C-16</p></div>
                                <div class="block-item" id="DS-C-17"><p>DS-C-17</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--31"><p>GB--31</p></div>
                                <div class="g-item" id="GB--32"><p>GB--32</p></div>
                                <div class="g-item" id="GB--33"><p>GB--33</p></div>
                                <div class="g-item" id="GB--34"><p>GB--34</p></div>
                                <div class="g-item" id="GB--35"><p>GB--35</p></div>
                                <div class="g-item" id="GB--36"><p>GB--36</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-18"><p>DS-C-18</p></div>
                                <div class="block-item" id="DS-C-19"><p>DS-C-19</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--42"><p>GB--42</p></div>
                                <div class="g-item" id="GB--41"><p>GB--41</p></div>
                                <div class="g-item" id="GB--40"><p>GB--40</p></div>
                                <div class="g-item" id="GB--39"><p>GB--39</p></div>
                                <div class="g-item" id="GB--38"><p>GB--38</p></div>
                                <div class="g-item" id="GB--37"><p>GB--37</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-20"><p>DS-C-20</p></div>
                                <div class="block-item" id="DS-C-21"><p>DS-C-21</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--43"><p>GB--43</p></div>
                                <div class="g-item" id="GB--44"><p>GB--44</p></div>
                                <div class="g-item" id="GB--45"><p>GB--45</p></div>
                                <div class="g-item" id="GB--46"><p>GB--46</p></div>
                                <div class="g-item" id="GB--47"><p>GB--47</p></div>
                                <div class="g-item" id="GB--48"><p>GB--48</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-22"><p>DS-C-22</p></div>
                                <div class="block-item" id="DS-C-23"><p>DS-C-23</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--54"><p>GB--54</p></div>
                                <div class="g-item" id="GB--53"><p>GB--53</p></div>
                                <div class="g-item" id="GB--52"><p>GB--52</p></div>
                                <div class="g-item" id="GB--51"><p>GB--51</p></div>
                                <div class="g-item" id="GB--50"><p>GB--50</p></div>
                                <div class="g-item" id="GB--49"><p>GB--49</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-24"><p>DS-C-24</p></div>
                                <div class="block-item" id="DS-C-25"><p>DS-C-25</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--55"><p>GB--55</p></div>
                                <div class="g-item" id="GB--56"><p>GB--56</p></div>
                                <div class="g-item" id="GB--57"><p>GB--57</p></div>
                                <div class="g-item" id="GB--58"><p>GB--58</p></div>
                                <div class="g-item" id="GB--59"><p>GB--59</p></div>
                                <div class="g-item" id="GB--60"><p>GB--60</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-26"><p>DS-C-26</p></div>
                                <div class="block-item" id="DS-C-27"><p>DS-C-27</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--66"><p>GB--66</p></div>
                                <div class="g-item" id="GB--65"><p>GB--65</p></div>
                                <div class="g-item" id="GB--64"><p>GB--64</p></div>
                                <div class="g-item" id="GB--63"><p>GB--63</p></div>
                                <div class="g-item" id="GB--62"><p>GB--62</p></div>
                                <div class="g-item" id="GB--61"><p>GB--61</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-28"><p>DS-C-28</p></div>
                                <div class="block-item" id="DS-C-29"><p>DS-C-29</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--67"><p>GB--67</p></div>
                                <div class="g-item" id="GB--68"><p>GB--68</p></div>
                                <div class="g-item" id="GB--69"><p>GB--69</p></div>
                                <div class="g-item" id="GB--70"><p>GB--70</p></div>
                                <div class="g-item" id="GB--71"><p>GB--71</p></div>
                                <div class="g-item" id="GB--72"><p>GB--72</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-30"><p>DS-C-30</p></div>
                                <div class="block-item" id="DS-C-31"><p>DS-C-31</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="GB--78"><p>GB--78</p></div>
                                <div class="g-item" id="GB--77"><p>GB--77</p></div>
                                <div class="g-item" id="GB--76"><p>GB--76</p></div>
                                <div class="g-item" id="GB--75"><p>GB--75</p></div>
                                <div class="g-item" id="GB--74"><p>GB--74</p></div>
                                <div class="g-item" id="GB--73"><p>GB--73</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-32"><p>DS-C-32</p></div>
                                <div class="block-item" id="DS-C-33"><p>DS-C-33</p></div>
                            </div>
                        </div>
                        <div class="table-item" style="margin-top: 0;">
                            <div class="g-block">
                                <div class="g-item" id="GB--79"><p>GB--79</p></div>
                                <div class="g-item" id="GB--80"><p>GB--80</p></div>
                                <div class="g-item" id="GB--81"><p>GB--81</p></div>
                                <div class="g-item" id="GB--82"><p>GB--82</p></div>
                                <div class="g-item" id="GB--83"><p>GB--83</p></div>
                                <div class="g-item" id="GB--84"><p>GB--84</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-34"><p>DS-C-34</p></div>
                                <div class="block-item" id="DS-C-35"><p>DS-C-35</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="border-bottom: 1px solid #000000;">
                        <div class="table-item">
                            <div class="g-block">
                                <div class="g-item" id="DS--44"><p>DS--44</p></div>
                                <div class="g-item" id="DS--45"><p>DS--45</p></div>
                                <div class="g-item" id="DS--46"><p>DS--46</p></div>
                                <div class="g-item" id="DS--47"><p>DS--47</p></div>
                                <div class="g-item" id="DS--48"><p>DS--48</p></div>
                                <div class="g-item" id="DS--49"><p>DS--49</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-36"><p>DS-C-36</p></div>
                                <div class="block-item" id="DS-C-37"><p>DS-C-37</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-tables">
                    <div class="box" style="border-top: 0;">
                        <div class="table-item" style="width: 83%;background: #ed7d31;">
                            <div class="block-left">
                                <div class="park-list"style="background: #FFFFFF;">
                                    <div class="park-block"></div>
                                    <div class="park-block"></div>
                                    <div class="park-block"></div>
                                    <div class="park-block"></div>
                                </div>
                                <div class="park-below">
                                    <div class="block-list" style="border-bottom: 1px solid #000000;">
                                        <div class="block-item" id="DS-A-1"><p>DS-A-1</p></div>
                                        <div class="block-item" id="DS-A-2"><p>DS-A-2</p></div>
                                        <div class="block-item" id="DS-A-3"><p>DS-A-3</p></div>
                                        <div class="block-item" id="DS-A-4"><p>DS-A-4</p></div>
                                        <div class="block-item" id="DS-A-5"><p>DS-A-5</p></div>
                                        <div class="block-item" id="DS-A-6"><p>DS-A-6</p></div>
                                        <div class="block-item" id="DS-A-7"><p>DS-A-7</p></div>
                                    </div>
                                    <div class="block-list" style="border-right: 1px solid #000000;">
                                        <div class="block-item" id="DS-A-14"><p>DS-A-14</p></div>
                                        <div class="block-item" id="DS-A-13"><p>DS-A-13</p></div>
                                        <div class="block-item" id="DS-A-12"><p>DS-A-12</p></div>
                                        <div class="block-item" id="DS-A-11"><p>DS-A-11</p></div>
                                        <div class="block-item" id="DS-A-10"><p>DS-A-10</p></div>
                                        <div class="block-item" id="DS-A-9"><p>DS-A-9</p></div>
                                        <div class="block-item" id="DS-A-8"><p>DS-A-8</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-right">
                                <div class="block-list">
                                    <div class="block-item" id="DS-A-15"><p>DS-A-15</p></div>
                                    <div class="block-item" id="DS-A-16"><p>DS-A-16</p></div>
                                    <div class="block-item" id="DS-A-16A"><p>DS-A-16A</p></div>
                                    <div class="block-item" id="DS-A-17"><p>DS-A-17</p></div>
                                    <div class="block-item" id="DS-A-18"><p>DS-A-18</p></div>
                                    <div class="block-item" id="DS-A-19"><p>DS-A-19</p></div>
                                    <div class="block-item" id="DS-A-20"><p>DS-A-20</p></div>
                                    <div class="block-item" id="DS-A-21"><p>DS-A-21</p></div>
                                    <div class="block-item" id="DS-A-22"><p>DS-A-22</p></div>
                                    <div class="block-item" id="DS-A-23"><p>DS-A-23</p></div>
                                    <div class="block-item" id="DS-A-24"><p>DS-A-24</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="height: 153px; border-top: 0; margin-top: 25px;">
                        <div class="table-item" style="flex-direction: column;">
                            <div class="block-list">
                                <div class="block-item" style="width: calc(100% + 121%);" id="DS-B-31"><p>DS-B-31</p></div>
                                <div class="block-item" id="DS-B-30"><p>DS-B-30</p></div>
                                <div class="block-item" id="DS-B-29"><p>DS-B-29</p></div>
                                <div class="block-item" id="DS-B-28"><p>DS-B-28</p></div>
                                <div class="block-item" id="DS-B-27"><p>DS-B-27</p></div>
                                <div class="block-item" id="DS-B-26"><p>DS-B-26</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-B-25"><p>DS-B-25</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" style="width: calc(100% + 121%);" id="DS-B-32"><p>DS-B-32</p></div>
                                <div class="block-item" id="DS-B-33"><p>DS-B-33</p></div>
                                <div class="block-item" id="DS-B-34"><p>DS-B-34</p></div>
                                <div class="block-item" id="DS-B-35"><p>DS-B-35</p></div>
                                <div class="block-item" id="DS-B-36"><p>DS-B-36</p></div>
                                <div class="block-item" id="DS-B-37"><p>DS-B-37</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-B-38"><p>DS-B-38</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="height: 126px;">
                        <div class="table-item" style="flex-direction: column;">
                        <div class="block-list">
                            <div class="block-item" style="width: calc(100% + 121%);" id="DS-B-45"><p>DS-B-45</p></div>
                            <div class="block-item" id="DS-B-44"><p>DS-B-44</p></div>
                            <div class="block-item" id="DS-B-43"><p>DS-B-43</p></div>
                            <div class="block-item" id="DS-B-42"><p>DS-B-42</p></div>
                            <div class="block-item" id="DS-B-41"><p>DS-B-41</p></div>
                            <div class="block-item" id="DS-B-40"><p>DS-B-40</p></div>
                            <div class="block-item" style="width: calc(100% + 52%);" id="DS-B-39"><p>DS-B-39</p></div>
                        </div>
                        <div class="block-list">
                            <div class="block-item" style="width: calc(100% + 121%);" id="DS-B-46"><p>DS-B-46</p></div>
                            <div class="block-item" id="DS-B-47"><p>DS-B-47</p></div>
                            <div class="block-item" id="DS-B-48"><p>DS-B-48</p></div>
                            <div class="block-item" id="DS-B-49"><p>DS-B-49</p></div>
                            <div class="block-item" id="DS-B-50"><p>DS-B-50</p></div>
                            <div class="block-item" id="DS-B-51"><p>DS-B-51</p></div>
                            <div class="block-item" style="width: calc(100% + 52%);" id="DS-B-52"><p>DS-B-52</p></div>
                        </div>
                        </div>
                    </div>
                    <div class="box" style="height: 126px;">
                        <div class="table-item" style="flex-direction: column;">
                            <div class="block-list">
                                <div class="block-item" id="DS-C-60"><p>DS-C-60</p></div>
                                <div class="block-item" id="DS-C-59"><p>DS-C-59</p></div>
                                <div class="block-item" id="DS-C-58"><p>DS-C-58</p></div>
                                <div class="block-item" id="DS-C-57"><p>DS-C-57</p></div>
                                <div class="block-item" id="DS-C-56"><p>DS-C-56</p></div>
                                <div class="block-item" id="DS-C-55"><p>DS-C-55</p></div>
                                <div class="block-item" id="DS-C-54"><p>DS-C-54</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-C-53"><p>DS-C-53</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-61"><p>DS-C-61</p></div>
                                <div class="block-item" id="DS-C-62"><p>DS-C-62</p></div>
                                <div class="block-item" id="DS-C-63"><p>DS-C-63</p></div>
                                <div class="block-item" id="DS-C-64"><p>DS-C-64</p></div>
                                <div class="block-item" id="DS-C-65"><p>DS-C-65</p></div>
                                <div class="block-item" id="DS-C-66"><p>DS-C-66</p></div>
                                <div class="block-item" id="DS-C-67"><p>DS-C-67</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-C-68"><p>DS-C-68</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="height: 126px;">
                        <div class="table-item" style="flex-direction: column;">
                            <div class="block-list">
                                <div class="block-item" id="DS-C-76"><p>DS-C-76</p></div>
                                <div class="block-item" id="DS-C-75"><p>DS-C-75</p></div>
                                <div class="block-item" id="DS-C-74"><p>DS-C-74</p></div>
                                <div class="block-item" id="DS-C-73"><p>DS-C-73</p></div>
                                <div class="block-item" id="DS-C-72"><p>DS-C-72</p></div>
                                <div class="block-item" id="DS-C-71"><p>DS-C-71</p></div>
                                <div class="block-item" id="DS-C-70"><p>DS-C-70</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-C-69"><p>DS-C-69</p></div>
                            </div>
                            <div class="block-list">
                                <div class="block-item" id="DS-C-77"><p>DS-C-77</p></div>
                                <div class="block-item" id="DS-C-78"><p>DS-C-78</p></div>
                                <div class="block-item" id="DS-C-79"><p>DS-C-79</p></div>
                                <div class="block-item" id="DS-C-80"><p>DS-C-80</p></div>
                                <div class="block-item" id="DS-C-81"><p>DS-C-81</p></div>
                                <div class="block-item" id="DS-C-82"><p>DS-C-82</p></div>
                                <div class="block-item" id="DS-C-83"><p>DS-C-83</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-C-84"><p>DS-C-84</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="table-item" style="flex-direction: column;">
                            <div class="block-list" style="height: 55px;">
                                <div class="block-item" id="DS-C-92"><p>DS-C-92</p></div>
                                <div class="block-item" id="DS-C-91"><p>DS-C-91</p></div>
                                <div class="block-item" id="DS-C-90"><p>DS-C-90</p></div>
                                <div class="block-item" id="DS-C-89"><p>DS-C-89</p></div>
                                <div class="block-item" id="DS-C-88"><p>DS-C-88</p></div>
                                <div class="block-item" id="DS-C-87"><p>DS-C-87</p></div>
                                <div class="block-item" id="DS-C-86"><p>DS-C-86</p></div>
                                <div class="block-item" style="width: calc(100% + 52%);" id="DS-C-85"><p>DS-C-85</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="border-top: 0;">
                        <div class="table-item" style="border-right:0px;">
                            <div class="ms-left">
                                  <div class="ms-block" style="border-top: 0px;"><p>MS--1</p></div>
                                  <div class="ms-block" id="MS--2"><p>MS--2</p></div>
                                  <div class="ms-block" id="MS-A-2"><p>MS-A-2</p></div>
                                  <div class="ms-block" id="MS--3"><p>MS--3</p></div>
                                  <div class="ms-block" style="height: 50px;" id="MS--4"><p>MS--4</p></div>
                                  <div class="ms-block" style="height: 50px;" id="MS--5"><p>MS--5</p></div>
                                  <div class="ms-block" style="height: 50px;" id="MS--6"><p>MS--6</p></div>
                                  <div class="ms-block" id="MS--7"><p>MS--7</p></div>
                                  <div class="ms-block" id="MS-7A"><p>MS-7A</p></div>
                                  <div class="ms-block" id="MS--8"><p>MS--8</p></div>
                                  <div class="ms-block" id="MS--9"><p>MS--9</p></div>
                                  <div class="ms-block" id="MS-A-9"><p>MS-A-9</p></div>
                                  <div class="ms-block" id="MS--10"><p>MS--10</p></div>
                                  <div class="ms-block" id="MS-A-10"><p>MS-A-10</p></div>
                                  <div class="ms-block" id="MS--11"><p>MS--11</p></div>
                            </div>
                            <div class="ms-right">
                            </div>
                        </div>
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
@endsection
