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
    var header = ['TimeStamp'/*, 'Arus (A)', 'Tegangan (V)', 'Getaran (Hz)', 'Thermocouple (C)'*/, 'Temperatur (C)'] ;
    var data, i, ds, first ;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      ticks = [] ;
      $.post("{{ route('syncExcel') }}") ;
      $.get("{{ route('getGraphicData') }}", function(req){
        i = 1 ;
        data = [] ;
        data.push(header) ;
        
        $.each(req.reverse(), function(key, value) {
          
          data.push(Object.values(value)) ;

          if (i == 1) {
            first = new Date(data[i][0]) ;
          }

          // console.log(data[i][0]) ;
          ds = new Date(data[i][0]) ;
          // console.log(ds) ;
          data[i][0] = ds ;

          if (i == 1 || i % 5 == 0) {
            ticks.push(data[i][0]) ;
          }

          i++ ;
        }) ;
        console.log(data) ;
        var dataChart = google.visualization.arrayToDataTable(data);

        var options = {
          title: 'Grafik Perubahan Data (' + first.toDateString() + ')' ,
          // curveType: 'function',
          height:500,
          width:'100%',
          legend: { position: 'right' },
          explorer: {axis: 'horizontal'},
          hAxis: {  
            title:'Waktu (hh:mm:ss)', 
            ticks: ticks,
            format: 'HH:mm:ss',
            showTextEvery: 1,
            maxAlternation: 2
          },
          series: {
                0: { 
                  pointShape: 'circle', 
                  targetAxisIndex: 0  
                }
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