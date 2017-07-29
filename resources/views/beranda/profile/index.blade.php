@extends('layouts.app-home')

@section('style')
<link href="/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">
@endsection

@section('script')
<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/mytuta/js/locations.js"></script>
@endsection

@section('html')ng-app="dropdown"@endsection

@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">

                                <!-- /.collapse-box  -->
                              @include('beranda.profile.side')
                                <!-- /.collapse-box  -->


                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->

                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href="/{{$user->username}}">
                                  <img class="userImg" src="{{Ads::getImage($user->foto)}}" alt="user"> {{ $user->name }}
                                </a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <!-- Traffic data -->


                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with green background -->
                                            <i class="icon-th-thumb ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">{{$myads_count}}</a><em>Iklan</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">Hello {{ Auth::user()->name }} </h3>
                            <span class="page-sub-header-sub small">You last logged in at: 01-01-2014 12:40 AM [UK time (GMT + 6:00hrs)]</span>
                        </div>
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                          </div>
                        @endif
                        @if (count($errors) > 0)
                          <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                          </div>
                        @endif
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse">Profil </a></h4>
                                </div>

                                <div class="panel-collapse collapse in" id="collapseB1">
                                    <div class="panel-body" ng-controller="DropDownCtrl" data-ng-init="init('{{$user->city->province->id}}')">

                                      {!! Form::model($user, array('route' => array('user.profile.update', $user->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nama</label>

                                                <div class="col-sm-9">

                                                    {!! Form::text('name', null, array('class' => 'form-control' , 'required' => 'required')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                    {!! Form::text('email', null, array('class' => 'form-control' , 'required' => 'required')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Username</label>

                                                <div class="col-sm-9">
                                                    {!! Form::text('username', null, array('class' => 'form-control', 'required' => 'required')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Foto</label>

                                                <div class="col-sm-9">
                                                    {!! Form::file('foto', Input::old('foto'), array('class' => 'form-control')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Provinsi</label>

                                                <div class="col-sm-9">
                                                  <select name="province_id" class='form-control' id='selectbasic'
                                                  ng-init="filter.valueprovince={{$user->city->province->id}}"
                                                  ng-model="filter.valueprovince"
                                                  ng-change="changeMe(filter.valueprovince)"
                                                  ng-options="value.id as value.province for value in provincelists">
                                                  <option value="">Pilih Provinsi</option>
                                                  </select>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kota</label>

                                                <div class="col-sm-9">

                                                  <select name="city_id" class='form-control' id='selectbasic'
                                                    ng-init="filter.valuecity={{$user->city_id}}"
                                                    ng-model="filter.valuecity"
                                                    ng-options="value.id as value.city for value in citylists">
                                                    <option value="">Pilih Kota</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat</label>

                                                <div class="col-sm-9">

                                                    {!! Form::textarea('address', null, array('class' => 'form-control')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">No. Telp</label>

                                                <div class="col-sm-9">

                                                    {!! Form::text('phone', null, array('class' => 'form-control', 'required' => 'required')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-default">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @if($user->facebook_id <> null)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse"> Koneksi </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseB2">
                                    <div class="panel-body">

                                        <!-- <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
                                          <span class="fa fa-facebook"></span> Hubungkan Dengan Facebook
                                        </a> -->

                                        <a href="https://facebook.com/{{$user->facebook_id}}" target="_blank" class="btn btn-social-icon btn-facebook">
                                          <span class="fa fa-facebook"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse"> Ganti Password </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseB2">
                                    <div class="panel-body">
                                        {!! Form::model($user, array('url' => array('user/profile/change-password', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form')) !!}
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Password Baru</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password" placeholder="Password Baru" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password Baru" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-default">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->

@endsection
