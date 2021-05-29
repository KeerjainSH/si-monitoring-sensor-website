@extends('adminlte::page')

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
                    <th>Beban 1</th>
                    <th>Beban 2</th>
                    <th>Beban 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>224</td>
                    <td>34.90</td>
                    <td>65.00</td>
                    <td></td>
                </tr>
                <tr>
                    <td>223</td>
                    <td>34.90</td>
                    <td>65.00</td>
                    <td></td>
                </tr>
                <tr>
                    <td>222</td>
                    <td>35.10</td>
                    <td>64.00</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class='col-sm text-center'>
            <button type='button' class='btn btn-primary'>Go Somewhere???</button>
        </div>
    </div>
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
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop