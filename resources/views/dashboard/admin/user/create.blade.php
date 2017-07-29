@extends('layouts.app-admin')

@section('script')
<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/mytuta/js/locations.js"></script>
@endsection

@section('html')ng-app="dropdown"@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <h2>Pengguna</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Membuat Pengguna Baru</div>
				<div class="panel-body">

          {!! Form::open(array('url' => 'dashboard/admin/user', 'files' => true)) !!}
					<div class="row">
					<div class="col-md-4">

              <div class="form-group required {{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Nama *') !!}
                {!! Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Nama', 'required' => 'required')) !!}
								@if ($errors->has('name'))
										<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'Email *') !!}
                {!! Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required')) !!}
								@if ($errors->has('email'))
										<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('username') ? ' has-error' : '' }}">
                {!! Form::label('username', 'Username*') !!}
                {!! Form::text('username', old('username'), array('class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required')) !!}
								@if ($errors->has('username'))
										<span class="help-block">
												<strong>{{ $errors->first('username') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('phone') ? ' has-error' : '' }}">
                {!! Form::label('phone', 'No. Telp*') !!}
                {!! Form::text('phone', Input::old('phone'), array('class' => 'form-control', 'placeholder' => 'No. Telp', 'required' => 'required')) !!}
								@if ($errors->has('phone'))
										<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
										</span>
								@endif
							</div>

						</div>
						<div class="col-md-4" ng-controller="DropDownCtrl">

							<div class="form-group required {{ $errors->has('province') ? ' has-error' : '' }}">
								{!! Form::label('province', 'Provinsi*') !!}

								<select required name="province_id" class='form-control' id='selectbasic'
								ng-model="filter.valueprovince"
								ng-change="changeMe(filter.valueprovince)"
								ng-options="value.id as value.province for value in provincelists">
								<option value="">Pilih Provinsi</option>
								</select>

								@if ($errors->has('province'))
										<span class="help-block">
												<strong>{{ $errors->first('province') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('city_id') ? ' has-error' : '' }}">
									{!! Form::label('city_id', 'Kota*') !!}

										<select required name="city_id" class='form-control' id='selectbasic'
											ng-model="filter.valuecity"
											ng-options="value.id as value.city for value in citylists">
											<option value="">Pilih Kota</option>
										</select>
										@if ($errors->has('city_id'))
												<span class="help-block">
														<strong>{{ $errors->first('city_id') }}</strong>
												</span>
										@endif
							</div>

							<div class="form-group required {{ $errors->has('role') ? ' has-error' : '' }}">
								{!! Form::label('role', 'Peranan *') !!}
								{!! Form::select('role', array('user' => 'Pengguna', 'admin' => 'Admin'), null, ['placeholder' => 'Pilih Peranan', 'required' => 'required', 'class' => 'form-control']) !!}
								@if ($errors->has('role'))
										<span class="help-block">
												<strong>{{ $errors->first('role') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
								{!! Form::label('password', 'Password *') !!}
								<input type="password" class="form-control" name="password" placeholder="Password Baru" required />
								@if ($errors->has('role'))
										<span class="help-block">
												<strong>{{ $errors->first('role') }}</strong>
										</span>
								@endif
							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group required {{ $errors->has('address') ? ' has-error' : '' }}">
								{!! Form::label('address', 'Alamat') !!}
								{!! Form::textarea('address', Input::old('address'), array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Alamat')) !!}
								@if ($errors->has('address'))
										<span class="help-block">
												<strong>{{ $errors->first('address') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('foto') ? ' has-error' : '' }}">
								{!! Form::label('foto', 'Foto') !!}
								{!! Form::file('foto', Input::old('foto'), array('class' => 'form-control')) !!}
								@if ($errors->has('foto'))
										<span class="help-block">
												<strong>{{ $errors->first('foto') }}</strong>
										</span>
								@endif
							</div>

						</div>

					</div>

					<div class="row">
          <div class="col-md-12">
						<hr />
						<div class=" pull-right">
							{!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
		          <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/admin/user') }}">Batal</a>
		          {!! Form::close() !!}
						</div>
					</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
