@extends('layouts.app-admin')
@section('meta')
<meta name="_token" content="{{{ csrf_token() }}}"/>
@endsection

@section('style')
<link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#cdata').DataTable();
});
</script>
<script>
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});
  $(document).on("click", ".open-InfoProfile", function () {
    var user_id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: '/api/user',
      data: { id: user_id },
      success: function (data) {
                  $('#respon').html(data);
                }
    });
    });
  </script>

  <script type="text/javascript">
  // confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
    $('#myModal').modal('hide');
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
</script>

  <script>
  $(function () {
    $('[data-toggle="modal"]').tooltip()
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ Session::get('message') }}
        </div>
      @endif

			<div class="panel panel-default">
  			<div class="panel-heading">
	    		<h3><i class="fa fa-user" aria-hidden="true"></i> Pengguna <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('dashboard/admin/user/create') }}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Buat Pengguna Baru</a><h3>
	  		</div>
	  		<div class="panel-body">
      <table id="cdata" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>USERNAME</th>
                  <th>KOTA</th>
                  <th>NO. TELP</th>
									<th>ROLE</th>
                  <th>AKSI</th>
              </tr>
          </thead>
          <tbody>
          @foreach($user as $value)
              <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->username }}</td>
                  <td>{{ $value->city->city }}</td>
                  <td>{{ $value->phone }}</td>
									<td>{{ $value->role }}</td>
                  <td>
                      {!! Form::open(array('url' => 'dashboard/admin/user/' . $value->id)) !!}
                          {!! Form::hidden('_method', 'DELETE') !!}
                          <a type="button" data-placement="left" title="Lihat" class="open-InfoProfile btn btn-xs btn-warning" data-toggle="modal" data-id="{{$value->id}}" href="#myModal"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></a>
                          <a data-toggle="tooltip" data-placement="left" title="Ganti" class="btn btn-xs btn-info" href="{{ URL::to('dashboard/admin/user/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                          <button data-toggle="modal" data-target="#confirmDelete" data-placement="left" title="Hapus" class="btn btn-xs btn-danger" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                      {!! Form::close() !!}
                  </td>
              </tr>

<!-- Modal delete -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Hapus Permanen</h4>
      </div>
      <div class="modal-body">
        <p>Anda serius ingin menghapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="confirm">Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal delete -->


          @endforeach
          </tbody>
      </table>
        </div>
      </div>
    </div>
	</div>
</div>

<!-- Modal add-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Tampilan Pengguna</h4>
      </div>
      <div class="modal-body">

<div id="respon"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>


      </div>
    </div>
  </div>
</div>
<!-- end modal -->
@endsection
