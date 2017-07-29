@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Kota</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Kota</div>
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

          {!! Form::model($city, array('route' => array('dashboard.admin.city.update', $city->id), 'method' => 'PUT')) !!}

          		<div class="form-group">
          		{!! Form::label('province_id', 'Provinsi') !!}
          		{!! Form::select('province_id', $province, null, array('class' => 'form-control')) !!}
          		</div>

							<div class="form-group">
                {!! Form::label('city', 'Kota') !!}
                {!! Form::text('city', null, array('class' => 'form-control', 'required' => 'required')) !!}
              </div>

          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
          <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/city') }}">Batal</a>
          {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
