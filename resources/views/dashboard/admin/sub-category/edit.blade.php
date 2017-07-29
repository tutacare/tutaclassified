@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Sub Kategori</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Sub-Kategori</div>
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

          {!! Form::model($subcategory, array('route' => array('dashboard.admin.sub-category.update', $subcategory->id), 'method' => 'PUT')) !!}

          		<div class="form-group">
          		{!! Form::label('category_id', 'Kategori') !!}
          		{!! Form::select('category_id', $category, null, array('class' => 'form-control')) !!}
          		</div>

							<div class="form-group">
                {!! Form::label('name', 'Sub-Kategori') !!}
                {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}
              </div>

          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
          <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/sub-category') }}">Batal</a>
          {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
