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
      <h2>Ganti Pengguna</h2>
      <hr />
			<div class="panel panel-default">
				<div class="panel-heading">Mengganti Data Pengguna</div>
				<div class="panel-body">


          @if (Session::has('message'))
          <div class="col-md-12">
          	<div class="alert alert-info alert-dismissible" role="alert">
          		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          		{{ Session::get('message') }}
          	</div>
          </div>
          @endif

          {!! Form::model($user, array('route' => array('dashboard.admin.user.update', $user->id), 'method' => 'PUT', 'files' => true)) !!}
					{!! Form::hidden('id', $user->id) !!}
					<div class="row">
					<div class="col-md-4">

							<div class="form-group required {{ $errors->has('name') ? ' has-error' : '' }}">
								{!! Form::label('name', 'Nama *') !!}
								{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nama', 'required' => 'required')) !!}
								@if ($errors->has('name'))
										<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
								{!! Form::label('email', 'Email *') !!}
								{!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required')) !!}
								@if ($errors->has('email'))
										<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('username') ? ' has-error' : '' }}">
								{!! Form::label('username', 'Username*') !!}
								{!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required')) !!}
								@if ($errors->has('username'))
										<span class="help-block">
												<strong>{{ $errors->first('username') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('phone') ? ' has-error' : '' }}">
								{!! Form::label('phone', 'No. Telp*') !!}
								{!! Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'No. Telp', 'required' => 'required')) !!}
								@if ($errors->has('phone'))
										<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
										</span>
								@endif
							</div>

						</div>
						<div class="col-md-4" ng-controller="DropDownCtrl" data-ng-init="init('{{$user->city->province->id}}')">

							<div class="form-group required {{ $errors->has('province') ? ' has-error' : '' }}">
								{!! Form::label('province', 'Provinsi*') !!}

								<select required name="province_id" class='form-control' id='selectbasic'
								ng-init="filter.valueprovince={{$user->city->province->id}}"
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
											ng-init="filter.valuecity={{$user->city_id}}"
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
								{!! Form::select('role', array('user' => 'Pengguna', 'admin' => 'Admin'), $user->role, ['placeholder' => 'Pilih Peranan', 'required' => 'required', 'class' => 'form-control']) !!}
								@if ($errors->has('role'))
										<span class="help-block">
												<strong>{{ $errors->first('role') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
								{!! Form::label('password', 'Password *') !!}
								<input type="password" class="form-control" name="password" placeholder="Password Baru" />
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
								{!! Form::textarea('address', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Alamat')) !!}
								@if ($errors->has('address'))
										<span class="help-block">
												<strong>{{ $errors->first('address') }}</strong>
										</span>
								@endif
							</div>

							<div class="form-group required {{ $errors->has('foto') ? ' has-error' : '' }}">
								{!! Form::label('foto', 'Foto') !!}
								{!! Form::file('foto', null, array('class' => 'form-control')) !!}
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
