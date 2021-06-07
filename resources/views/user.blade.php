@extends('adminlte::page', ['loggedin' => $loggedin])

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
                                @if ($user->level == 'user' || $loggedin->id == $user->id)
                                    @if ($user->level == 'user')
                                        <button type="button" id='modalKu' data-id='{{ $user->id }}' data-toggle="modal" data-target="#modalA" class="addAdmin btn btn-sm btn-success">+Admin</button>
                                    @endif
                                    <button type="button" id='modalKu' data-id='{{ $user->id }}' data-toggle="modal" data-target="#modalE" class="editUser btn btn-sm btn-primary">Edit</button>
                                    <button type="button" id='modalKu' data-id='{{ $user->id }}' data-toggle="modal" data-target="#modalC" class="deleteUser btn btn-sm btn-danger">Remove</button>
                                @endif
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

<div class="modal fade" id="modalC">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        Apakah anda yakin?
      </div>

      <div class="modal-footer">
        <form action='/user/delete' method='get' id='formKu'>
            
            <input type='hidden' id='id1' name='id'>
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalA">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        Apakah anda yakin?
      </div>

      <div class="modal-footer">
        <form action='/user/admin' method='get' id='formKu3'>
            
            <input type='hidden' id='id3' name='id'>
            <input type='hidden' name='role' value='admin'>
            <button type="submit" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalE">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Ubah Identitas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

        <form action='/user/edit' method='get' id='formKu2'>
            <div class="modal-body">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name='nama' required>
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name='email' required>
            </div>

            <div class="modal-footer">
                    
                    <input type='hidden' id='id2' name='id'>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </form>

    </div>
  </div>
</div>

@stop

@section('css')
    
@stop

@section('js')

@stop

@section('graphicjs')
<script>
    $(document).on('click','.deleteUser',function(){
         let id = $(this).attr('data-id');
         $('#id1').val(id);
    });

    $(document).on('click','.editUser',function(){
         let id = $(this).attr('data-id');
         $('#id2').val(id);
    });

    $(document).on('click','.addAdmin',function(){
         let id = $(this).attr('data-id');
         $('#id3').val(id);
    });
</script>
@stop