@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      @if (Session::has('message'))
      <div class="col-md-12">
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ Session::get('message') }}
        </div>
      </div>
      @endif

			<h1>Produk <small>Detail</small></h1>
			{!! Form::model($product, array('url' => array('dashboard/admin/product/save-mod', $product->id), 'method' => 'PUT', 'files' => true)) !!}
      <table class="table table-condensed">
        <tr><td>Nama Produk</td><td>:</td><td>{!! Form::text('product_title', null, array('class' => 'form-control', 'required' => 'required')) !!}</td></tr>
        <tr><td>Kategori</td><td>:</td><td>{{ $product->subCategory->category->category }}</td></tr>
				<tr><td>Detail</td><td>:</td><td>{{ $product->subCategory->name }}</td></tr>
				<tr><td>Keterangan</td><td>:</td><td>{!! Form::textarea('product_description', null, array('class' => 'form-control', 'required' => 'required')) !!}</td></tr>
				<tr><td>Harga</td><td>:</td><td>Rp. {{number_format($product->product_price, 0, ',', '.')}} @if ($product->nego == 1) Nego @endif</td></tr>
        <tr><td>Status</td><td>:</td><td>{!! Form::select('status', array('publish' => 'Publish', 'mod' => 'Proses Moderasi', 'tolak' => 'Ditolak'), $product->status, array('class' => 'form-control')) !!}</td></tr>

				<tr><td>Gambar Utama</td><td>:</td><td><img src="/images/product/{{$product->foto1}}" alt="{{$product->foto1}}" class="img-responsive" style="width:500px"></td></tr>
      </table>
			{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
			<a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/product') }}">Batal</a>
			{!! Form::close() !!}
			<br />


				</div>
	</div>
</div>
@endsection
