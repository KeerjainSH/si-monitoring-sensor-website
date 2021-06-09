@extends('adminlte::page', ['loggedin' => $loggedin])

@section('title', 'Dashboard')

@section('content_header')
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-satellite-dish"></i></b> Real Time Monitoring</div>
</div>
@stop

@section('content')

<div class='card'>
    <div class='card-body bg-light border'>
        <table class='table table-striped table-hover table-bordered mb-sm-3'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sensor 1</th>
                    <th>Sensor 2</th>
                    <th>Sensor 3</th>
                    <th>Sensor 4</th>
                    <th>Sensor 5</th>
                </tr>
            </thead>
            <tbody class='sensorTable'>
                <div class="">
                    <!-- <tr>
                        <td>No</td>
                        <td>Sensor 1</td>
                        <td>Sensor 2</td>
                        <td>Sensor 3</td>
                        <td>Sensor 4</td>
                        <td>Sensor 5</td>
                    </tr> -->
                </div>
            </tbody>
        </table>
        <div class='col-sm text-center'>
            <button type='button' class='btn btn-primary'>Go Somewhere???</button>
        </div>
    </div>
    @if ($loggedin->level == 'admin')
    <div class='card-footer border' style='background-color:#f7f7f7'>
        <div class='row'>
            <div class="col-sm-4">
                <div class='card bg-light align-items-center'>
                    <div class='card-header'>SENSOR 1</div>
                    <div class='card-body'>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">ON</button>
                            <button type="button" class="btn btn-warning">OFF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class='card bg-light align-items-center'>
                    <div class='card-header'>SENSOR 2</div>
                    <div class='card-body'>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">ON</button>
                            <button type="button" class="btn btn-warning">OFF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class='card bg-light align-items-center'>
                    <div class='card-header'>SENSOR 3</div>
                    <div class='card-body'>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">ON</button>
                            <button type="button" class="btn btn-warning">OFF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="col-sm-4">
                <div class='card bg-light align-items-center'>
                    <div class='card-header'>SENSOR 4</div>
                    <div class='card-body'>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">ON</button>
                            <button type="button" class="btn btn-warning">OFF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class='card bg-light align-items-center'>
                    <div class='card-header'>SENSOR 5</div>
                    <div class='card-body'>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">ON</button>
                            <button type="button" class="btn btn-warning">OFF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@stop

@section('css')
    
@stop

@section('js')
    
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
<script>
//   var ctx = document.getElementById("myChart");
  var data
  var count = 0 ;
  var updateData = function() {
    $.ajax({
      url: "{{ route('fetchData') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        //   var newCount = data.length ;
        console.log(data) ;
        //   if (newCount != count) {
        //       count = newCount ;
        //       event(new App/Events/SensorUpdated()) ;
        //   }
        var resultTag = "" ;
        var i = 0 ;
        // console.log(j) ;
        // j++ ;
        $.each(data, function(){
            var j = i+1 ;
            resultTag += 
            "<tr>" +
                "<td>" + j + "</td>" +
                "<td>" + data[i]['sensor1'].toFixed(2) + "</td>" +
                "<td>" + data[i]['sensor2'].toFixed(2) + "</td>" +
                "<td>" + data[i]['sensor3'].toFixed(2) + "</td>" +
                "<td>" + data[i]['sensor4'].toFixed(2) + "</td>" +
                "<td>" + data[i]['sensor5'].toFixed(2) + "</td>" +
            "</tr>"
            i += 1 ;
        }) ;
        $('.sensorTable').html(resultTag) ;
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateData();
  setInterval(() => {
    updateData();
  }, 5000);
</script>
<!-- <script src="{{ mix('/js/app.js') }}"></script> -->
@stop