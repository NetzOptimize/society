@extends('layouts.main')
@section('title')
Society Home
@endsection
@section('content')
<div class="main">

<!-- dashboard navabar -->
<div class="dashboard-navbar container">

<div class="row d-flex justify-content-center gap-2 p-2" >
  <div class="col-3">
    <div class="card dash  bg-primary text-light">
      <div class="card-body">
        <h5 class="card-title">Total Amount</h5>
        <p class="card-text">{{ $payment }}</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="card dash bg-warning text-light">
      <div class="card-body">
        <h5 class="card-title"> Total Expenditure</h5>
        <p class="card-text">{{  $expense }}</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="card dash bg-dark text-light">
      <div class="card-body">
        <h5 class="card-title">Remaining</h5>
        <p class="card-text">{{$payment-$expense  }}</p>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
</div>


</div>

<!-- dashboard end -->


<div class="container">
<div>
  <canvas id="user-chart" class="p-4"   style="    border: 1px solid darkgrey;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('user-chart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'Febuary', 'March', 'April', 'May', 'June','July','August','September','October','November','December'],
      datasets: [{
        label:'Graph of users',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
      responsive:true
    }
  });


</script>

</div>
<!-- doughnut -->
<script>
  <div>
  <canvas id="dough-chart" class="p-4"   style="    border: 1px solid darkgrey;"></canvas>
</div>
const config = {
  type: 'doughnut',
  data: data,
};
const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
</script>

</div>
@endsection

