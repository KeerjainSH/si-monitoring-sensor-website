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

<script>
    var arus = [] ;
    var volt = [] ;
    var hz = [] ;
    var celc = [] ;
    var lupa = [] ;
    var label = [] ;
    var i ;
    var updateChart = function(){
      arus = volt = hz = celc = lupa = label = [] ;
      $.ajax({
        url: "{{ route('getGraphicData') }}",
        type: 'GET',
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          i = 4 ;
          $.each(data, function(){
            arus.push(data[i]['sensor1']) ;
            volt.push(data[i]['sensor2']) ;
            hz.push(data[i]['sensor3']) ;
            celc.push(data[i]['sensor4']) ;
            lupa.push(data[i]['sensor5']) ;
            label.push(data[i]['created_at']) ;
            i -= 1 ;
          }) ;
        },
        error: function(data){
          console.log(data);
        }
      });
    }  
    
</script>
@stop