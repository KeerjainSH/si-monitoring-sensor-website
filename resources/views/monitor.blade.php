@extends('adminlte::page', ['loggedin' => $loggedin])

@section('title', 'Monitoring')

@section('content_header')
    
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-satellite-dish"></i></b> Real Time Monitoring</div>
</div>

@stop

@section('content')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class='card'>
    <div class='card-header border'>
        <i class="fas fa-download"></i> Export PDF
    </div>
    <div class='card-body border'>
        <form action='' method=''>
            <div class="container p-3">
                <label>Tanggal Awal</label>
                <input class="date form-control mb-5" type="text">
                <label>Tanggal Akhir</label>
                <input class="date form-control mb-3" type="text">
                <input type='button' class='btn btn-primary' type='submit' value='Export'></input>
            </div>
        </form>
    </div>
    <div class='card-footer border'>

    </div>
</div>
@if ($loggedin->level == 'admin')
<div class='card'>
    <div class='card-header border'>
        <i class="fas fa-upload"></i> Import Excel
    </div>
    <div class='card-body border'>
        <form action='' method=''>
            <div class="container p-3">
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile"></label>
                </div>
                
                <input type='button' class='btn btn-primary' type='submit' value='Import'></input>
            </div>
        </form>
    </div>
    <div class='card-footer border'>

    </div>
</div>
@endif
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script>

@stop

@section('css')
    
@stop

@section('js')
    
@stop