@extends('layouts.app-admin')

@section('style')
<link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#cdata-pending').DataTable();
} );
$(document).ready(function() {
    $('#cdata-publish').DataTable();
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
			<div class="panel panel-warning">
  			<div class="panel-heading">
	    		<h3 class="panel-title">Produk Menunggu Proses Moderasi</h3>
	  		</div>
	  		<div class="panel-body">
		      <table id="cdata-pending" class="table table-striped table-bordered" cellspacing="0" width="100%">
		          <thead>
		              <tr>
		                  <th>Nama Produk</th>
											<th>Keterangan</th>
											<th>Harga</th>
											<th>Gambar</th>
		                  <th>Status</th>
		                  <th>Aksi</th>
		              </tr>
		          </thead>
		          <tbody>
		          @foreach($product_mod as $value)
		              <tr>
		                  <td>{{ $value->product_title }}</td>
											<td>{{ $value->product_description }}</td>
											<td>{{number_format($value->product_price, 0, ',', '.')}}</td>
											<td><img src="/images/product/{{$value->foto1}}" alt="{{$value->foto1}}" class="img-responsive" style="width:100px"></td>
		                  <td>{{ $value->status }}</td>
											<td>

                          {!! Form::open(array('url' => 'dashboard/admin/product/' . $value->id)) !!}
    													{!! Form::hidden('_method', 'DELETE') !!}
                              <a class="btn btn-sm btn-success" href="{{ URL::to('dashboard/admin/product/' . $value->id . '/show') }}"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
    													<button class="btn btn-xs btn-danger" onClick="return confirm('Benar ingin menghapus?')" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    											{!! Form::close() !!}
		                    </td>
		              </tr>
		          @endforeach
		          </tbody>
		      </table>
			</div>
		</div>

    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Produk Sudah di Publish</h3>
      </div>
      <div class="panel-body">
      <table id="cdata-publish" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
								<th>Nama Produk</th>
                <th>Tanggal Mulai</th>
                <th>Expired</th>
								<th>Harga</th>
                <th>Dilihat</th>
                <th>Aksi</th>
              </tr>
          </thead>
					<tbody>
					@foreach($product_publish as $value)
							<tr>
									<td>{{ $value->product_title }}</td>
                  <td>{{ date('d-m-Y', strtotime($value->sundul_at))}}</td>
                  <td>{{ Carbon::createFromTimeStamp(strtotime($value->sundul_at))->addMonth()->format('d-m-Y') }}</td>
									<td>{{ Ads::harga($value->product_price, $value->nego) }}</td>
                  <td>{{ $value->viewer }} Kali</td>
                  <td>
                  {!! Form::open(array('url' => 'dashboard/admin/product/' . $value->id)) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      <a class="btn btn-xs btn-success" href="{{ URL::to('dashboard/admin/product/' . $value->id . '/show') }}"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
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
