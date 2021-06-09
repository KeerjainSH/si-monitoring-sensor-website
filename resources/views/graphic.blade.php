@extends('adminlte::page', ['loggedin' => $loggedin])

@section('title', 'Graphic')

@section('content_header')
    
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-chart-line"></i></b> Chart</div>
</div>

@stop

@section('content')
    
<div class='card'>
    <div class='card-body'>
        <div id='chartku'></div>
        <!-- <canvas id="myChart"></canvas> -->
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    
@stop

@section('graphicjs')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script>
    var header = ['TimeStamp', 'Arus (A)', 'Tegangan (V)', 'Getaran (Hz)', 'Thermocouple (C)', 'Lupa'] ;
    var data, row, i ;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data1 ;  var data2 ; var data3 ;
      var data4 ; var data5 ; var ds ;
      $.get("{{ route('getGraphicData') }}", function(req){
        i = 0 ;
        var first = new Date(req[4]['created_at']) ;
        console.log(req) ;
        $.each(req, function(key, value) {
          if (i == 0) {
            data1 = Object.values(value) ;
            var d = new Date(data1[0]) ;
            data1[0] = first - d ;
          }
          if (i == 1) {
            data2 = Object.values(value) ;
            var d = new Date(data2[0]) ;
            data2[0] = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds() ;
          }
          if (i == 2){
            data3 = Object.values(value) ;
            var d = new Date(data3[0]) ;
            data3[0] = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds() ;
          }
          if (i == 3){
            data4 = Object.values(value) ;
            var d = new Date(data4[0]) ;
            data4[0] = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds() ;
          }
          if (i == 4) {
            data5 = Object.values(value) ;
            ds = new Date(data5[0]) ;
            data5[0] = ds.getHours() + ':' + ds.getMinutes() + ':' + ds.getSeconds() ;
          } 
          i++ ;
        }) ;

        var dataChart = google.visualization.arrayToDataTable([
          header, data5, data4, data3, data2, data1
        ]);

        var options = {
          title: 'Grafik Perubahan Data (' + ds.toUTCString() + ')' ,
          curveType: 'function',
          height:500,
          legend: { position: 'bottom' },
          series: {
                0: { pointShape: 'circle' },
                1: { pointShape: 'triangle' },
                2: { pointShape: 'square' },
                3: { pointShape: 'diamond' },
                4: { pointShape: 'star' },
                5: { pointShape: 'polygon' }
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chartku'));

        chart.draw(dataChart, options);
      }) ;
    }
    setInterval(() => {
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    }, 5000);
</script>
@stop