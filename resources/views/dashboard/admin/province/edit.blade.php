@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Provinsi</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Provinsi</div>
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

          {!! Form::model($province, array('route' => array('dashboard.admin.province.update', $province->id), 'method' => 'PUT')) !!}

          		<div class="form-group">
          		{!! Form::label('province', 'Provinsi') !!}
          		{!! Form::text('province', null, array('class' => 'form-control', 'required' => 'required')) !!}
          		</div>

          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
          <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/province') }}">Batal</a>
          {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
