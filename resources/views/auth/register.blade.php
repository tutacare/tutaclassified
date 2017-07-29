@extends('layouts.app-home')

@section('style')
<link href="/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">
@endsection

@section('script')
<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/mytuta/js/locations.js"></script>
<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
@endsection

@section('html')ng-app="dropdown"@endsection

@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i> Buat akun, Gratis </h2>

                        <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Buat Dengan Facebook
                        </a>
                        <br />
                        <div class="text-info text-center"><strong>ATAU</strong></div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12" ng-controller="DropDownCtrl">
                              <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                  {!! csrf_field() !!}
                                    <fieldset>

                                        <!-- Text input-->
                                        <div class="form-group required {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Nama <sup>*</sup></label>

                                            <div class="col-md-6">
                                                       <input type="text" placeholder="Nama" class="form-control input-md"
                                                              required="" name="name" value="{{ old('name') }}">

                                                       @if ($errors->has('name'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('name') }}</strong>
                                                           </span>
                                                       @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Username <sup>*</sup></label>

                                            <div class="col-md-6">
                                                        {!! Form::text('username', old('username'), array('class' => 'form-control input-md', 'placeholder' => 'Username', 'required' => 'required')) !!}
                                                       @if ($errors->has('username'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('username') }}</strong>
                                                           </span>
                                                       @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="inputEmail3" class="col-md-4 control-label">Email
                                                <sup>*</sup></label>

                                            <div class="col-md-6">
                                                       <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" value="{{ old('email') }}" required="required">

                                                       @if ($errors->has('email'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('email') }}</strong>
                                                           </span>
                                                       @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('province_id') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Provinsi <sup>*</sup></label>

                                            <div class="col-md-6">
                                               <select name="province_id" class='form-control' id='selectbasic'
                                               ng-model="filter.valueprovince"
                                               ng-change="changeMe(filter.valueprovince)"
                                               ng-options="value.id as value.province for value in provincelists">
                                               <option value="">Pilih Provinsi</option>
                                               </select>
                                               @if ($errors->has('province_id'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('province_id') }}</strong>
                                                   </span>
                                               @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Kota <sup>*</sup></label>

                                            <div class="col-md-6">
                                              <select name="city_id" class='form-control' id='selectbasic'
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
                                        </div>

                                        <div class="form-group required {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">No. Telp <sup>*</sup></label>

                                            <div class="col-md-6">
                                                       <input type="text" placeholder="No. Telp" class="form-control input-md"
                                                               required="required" name="phone" value="{{ old('phone') }}">

                                                       @if ($errors->has('phone'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('phone') }}</strong>
                                                           </span>
                                                       @endif
                                            </div>
                                        </div>

                                          <div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password <sup>*</sup></label>

                                            <div class="col-md-6">
                                                       <input type="password" required="required" class="form-control" id="inputPassword3" placeholder="Password" name="password">

                                                       @if ($errors->has('password'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('password') }}</strong>
                                                           </span>
                                                       @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                          <label for="inputPassword3" class="col-md-4 control-label">Ulangi Password <sup>*</sup></label>

                                          <div class="col-md-6">

                                                     <input type="password" required="required" class="form-control" id="inputPassword3" placeholder="Ulangi Password" name="password_confirmation">

                                                     @if ($errors->has('password_confirmation'))
                                                         <span class="help-block">
                                                             <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                         </span>
                                                     @endif
                                          </div>
                                      </div>

                                      <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">Kode Keamanan</label>

                                          <div class="col-md-6">
                                              <div class="g-recaptcha" data-sitekey="{{Config::get('recaptcha.recaptcha_site_key')}}"></div>
                                              @if ($errors->has('g-recaptcha-response'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div class="termbox mb10">

                                                        Dengan menekan Daftar Akun, saya mengkonfirmasi telah menyetujui <a href="terms-conditions.html">Syarat dan Ketentuan, serta Kebijakan Privasi</a> Betawaran.

                                                </div>
                                                <div style="clear:both"></div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i> Daftar Akun
                                                </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>
                        <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                            <h3><strong>Create and Manage Items</strong></h3>

                            <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                                Praesent tristique elit pharetra magna efficitur laoreet.</p>
                        </div>
                        <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                            <h3><strong>Create your Favorite ads list.</strong></h3>

                            <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                                Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->
@endsection
