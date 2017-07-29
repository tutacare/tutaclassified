@extends('layouts.app-admin')

@section('style')
<link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#cdata').DataTable();
} );
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
	    		<h3><i class="fa fa-list-ul" aria-hidden="true"></i> Sub Kategori


    					<a class="btn btn-sm btn-success pull-right" href="{{ URL::to('dashboard/admin/sub-category/create') }}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Buat Sub Kategori Baru</a><h3>
	  		</div>
	  		<div class="panel-body">
      <table id="cdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
									<th>Nama Kategori</th>
                  <th>Nama Sub-Kategori</th>
                  <th>Ganti</th>
                  <th>Hapus</th>
              </tr>
          </thead>
          <tbody>
          @foreach($subcategory as $value)
              <tr>
                  <td>{{ $value->category->category }}</td>
									<td>{{ $value->name }}</td>
                  <td>
                      <a class="btn btn-xs btn-info" href="{{ URL::to('dashboard/admin/sub-category/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td><td>

                      {!! Form::open(array('url' => 'dashboard/admin/sub-category/' . $value->id)) !!}
                          {!! Form::hidden('_method', 'DELETE') !!}
                          <button class="btn btn-xs btn-danger" onClick="return confirm('Benar ingin menghapus?')" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                      {!! Form::close() !!}
                  </td>
              </tr>
          @endforeach
          </tbody>
      </table>
      </div>
    </div>
				</div>
	</div>
</div>
@endsection
