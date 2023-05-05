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
        .structure {
    overflow: scroll;
    height: 100vh;
    width: 100%;
    /* border: 1px solid red; */
    overflow-x: scroll;

}
.structure-container {
    overflow-x: auto;
}
@media screen and (max-width:992px) {
    .left-tables, .right-tables {
width: unset;
   display: flex;
    flex-direction: column;
}
.left-tables, .right-tables{
    width: unset;
}
.left-tables {
    padding-bottom: 4.8rem;
    border-right: 80px solid #ed7d31;    width: unset;
}


}
@media screen and (max-width:768px) {
    p {

 font-size: 9px;
}
}


     </style>
</head>
<body>
    <select name="month" id="month" class="form-select  mt-2 mb-2 ms-5 w-auto">
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
            console.log('change');
            $('div').removeClass("paid");
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

{{-- <!DOCTYPE html>
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


</html> --}}
