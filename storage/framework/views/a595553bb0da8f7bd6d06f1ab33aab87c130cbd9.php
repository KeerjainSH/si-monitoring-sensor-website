

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-satellite-dish"></i></b> Real Time Monitoring</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class='card'>
    <div width='50%' class='card-body bg-light border'>
        <table class='table table-striped table-hover table-bordered mb-sm-3'>
            <thead>
                <tr>
                    <th width='8%'>No</th>
                    <th width='92%'>Sensor Temperatur</th>
                    <!-- <th>Sensor 2</th>
                    <th>Sensor 3</th>
                    <th>Sensor 4</th> -->
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
        
    </div>
    <?php if($loggedin->level == 'admin'): ?>
    <div class='card-footer border' style='background-color:#f7f7f7'>
        <?php if(session('status')): ?>
            <div class="alert alert-success my-3" role='alert'>
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="card-columns">
        <?php $__empty_1 = true; $__currentLoopData = $sensorstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sensor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class='card bg-light align-items-center'>
                <div class='card-header'>
                    <?php echo e($sensor->name); ?>

                    <button class="btn btn-sm btn-primary float-right disabled">
                        <?php echo e($sensor->status == 1 ? 'On' : 'Off'); ?>

                    </button>
                </div>
                <div class='card-body'>
                    <div class="btn-group">
                        <a type='button' href="<?php echo e(route('sensor.status', [$sensor->id, '1'])); ?>" class='btn btn-success'>ON</a>
                        <a type='button' href="<?php echo e(route('sensor.status', [$sensor->id, '0'])); ?>" class='btn btn-warning'>OFF</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-warning my-3" role='alert'>
                Status Table is Empty
            </div>
        <?php endif; ?>
            
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<script>
  var data
  var updateData = function() {
    $.post("<?php echo e(route('syncExcel')); ?>") ;
    $.ajax({
      url: "<?php echo e(route('fetchData')); ?>",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {

        var resultTag = "" ;
        var i = 0 ;
        var len = data.length ;
        
        $.each(data, function(){
            var j = len-i ;
            resultTag += 
            "<tr>" +
                "<td>" + j + "</td>" +
                "<td>" + data[i]['sensor1'].toFixed(2) + "</td>" +
                // "<td>" + data[i]['sensor2'].toFixed(2) + "</td>" +
                // "<td>" + data[i]['sensor3'].toFixed(2) + "</td>" +
                // "<td>" + data[i]['sensor4'].toFixed(2) + "</td>" +
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', ['loggedin' => $loggedin], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\v2\resources\views/dashboard.blade.php ENDPATH**/ ?>