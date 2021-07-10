

<?php $__env->startSection('title', 'Graphic'); ?>

<?php $__env->startSection('content_header'); ?>
    
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-chart-line"></i></b> Chart</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<div class='card'>
    <div class='card-body'>
        <div id='chartku'></div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('graphicjs'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script>
    var header = ['TimeStamp'/*, 'Arus (A)', 'Tegangan (V)', 'Getaran (Hz)', 'Thermocouple (C)'*/, 'Temperatur (C)'] ;
    var data, i, ds, first ;

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      $.post("<?php echo e(route('syncExcel')); ?>") ;
      $.get("<?php echo e(route('getGraphicData')); ?>", function(req){
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
          data[i][0] = ds.toLocaleString('en-IN') ;
          i++ ;
        }) ;
        console.log(data) ;
        var dataChart = google.visualization.arrayToDataTable(data);

        var options = {
          title: 'Grafik Perubahan Data (' + first.toDateString() + ')' ,
          // curveType: 'function',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', ['loggedin' => $loggedin], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\v2\resources\views/graphic.blade.php ENDPATH**/ ?>