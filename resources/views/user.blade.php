@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    
<div class='card'>
<div class='card-header bg-primary'><b><i class="fas fa-user"></i></b> Users</div>
</div>

@stop

@section('content')
    
<div class='card'>
    <div class='card-body bg-light border'>
        <table class='table table-striped table-hover table-bordered mb-sm-3'>
            <thead>
                <tr class='text-center'>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->level }}</td>
                    <td>
                        <div class='col-sm text-center'>
                            <div class="btn-group">
                                <button type="button" href='user/edit/{{ $user->id }}' class="btn btn-sm btn-success">Edit</button>
                                <button type="button" href='user/remove/{{ $user->id }}' class="btn btn-sm btn-danger">Remove</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Tidak ada user.
                </div>
            @endforelse
            </tbody>
        </table>
        <div class='d-flex justify-content-center'>
            {!! $users->links() !!}
        </div>
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    
@stop