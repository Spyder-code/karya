@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right border-warning">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $userCount }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Funners</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right border-primary">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $postCount }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Post
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="check-circle"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChartLine" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChartBar" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script>
        var data = {!! json_encode($userArr) !!};
        var data2 = {!! json_encode($postArr) !!};
        var color = [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(251, 59, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 240, 64, 0.2)',
                        'rgba(155, 240, 64, 0.2)',
                        'rgba(200, 240, 64, 0.2)',
                        'rgba(210, 240, 64, 0.2)',
                        'rgba(130, 240, 64, 0.2)',
                    ];
        var ctx = document.getElementById('myChartLine').getContext('2d');
        var cty = document.getElementById('myChartBar').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'Maret', 'April', 'May', 'June','July','Agust','Sept','October','Noverber','December'],
                datasets: [{
                    label: 'Funners Registration',
                    data: data,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var myChartBar = new Chart(cty, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'Maret', 'April', 'May', 'June','July','Agust','Sept','October','Noverber','December'],
                datasets: [{
                    label: 'Funners Registration',
                    data: data2,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
@endsection