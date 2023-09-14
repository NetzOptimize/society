@extends('layouts.mainWithoutNav')
@include('users.navbar')
@section('title')
Society Home
@endsection
@section('content')
<div class="container">
    <div>
        <canvas id="user-chart"></canvas>
    
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
        @php ksort($paymentsByMonth);@endphp
        <script>
          const ctx = document.getElementById('user-chart');
    
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels:<?= json_encode(array_keys($paymentsByMonth)) ?>,
              datasets: [{
                label: 'house Payments by Month',
                data: <?= json_encode(array_values($paymentsByMonth)) ?>,
                borderWidth: 1,
                backgroundColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 205, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(201, 203, 207, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 205, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(54, 162, 235, 1)',
                ],
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
              responsive: true,
            },
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
