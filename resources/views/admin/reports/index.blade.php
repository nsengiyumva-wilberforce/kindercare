@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
    <canvas id="canvas" height="280" width="600"></canvas>
        </div>
    </div>
    <script>
        var url = "{{url('admin/report')}}";
        var id = new Array();
        var userCode = new Array();
        var score = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
              id.push(data.id);
              userCode.push(data.user_code);
              score.push(data.score);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Years,
                      datasets: [{
                          label: 'Scores',
                          data: Prices,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>
@endsection