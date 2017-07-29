@extends('layouts.app-admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Sub Kategori</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Membuat Sub Kategori Baru</div>
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

          {!! Form::open(array('url' => 'dashboard/admin/sub-category')) !!}

						<div class="form-group">
							{!! Form::label('category_id', 'Kategori') !!}
							{!! Form::select('category_id', $category, Input::old('category_id'), array('class' => 'form-control')) !!}
						</div>
							<div class="form-group">
                {!! Form::label('name', 'Sub-Kategori') !!}
                {!! Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required')) !!}
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
