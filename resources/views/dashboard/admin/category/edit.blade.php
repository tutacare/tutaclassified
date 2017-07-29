@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Kategori Product</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Kategori Produk</div>
				<div class="panel-body">

          {!! Html::ul($errors->all()) !!}

          @if (Session::has('message'))
          <div class="col-md-12">
          	<div class="alert alert-info alert-dismissible" role="alert">
          		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          		{{ Session::get('message') }}
          	</div>
          </div>
          @endif

          {!! Form::model($category, array('route' => array('dashboard.admin.category.update', $category->id), 'method' => 'PUT', 'files' => true)) !!}

          		<div class="form-group">
          		{!! Form::label('category', 'Kategori') !!}
          		{!! Form::text('category', null, array('class' => 'form-control', 'required' => 'required')) !!}
          		</div>
							<div class="form-group">
							{!! Form::label('foto', 'Gambar') !!}
							<p><img src="/images/category/{{$category->foto}}" class="img-responsive" style="width:100px"></p>
							{!! Form::file('foto', null, array('class' => 'form-control')) !!}
							</div>

          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
          <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/category') }}">Batal</a>
          {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
