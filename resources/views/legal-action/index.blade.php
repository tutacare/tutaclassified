@extends('layouts.app-home')

@section('script')
<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/mytuta/js/locations.js"></script>
@endsection

@section('html')ng-app="dropdown"@endsection

@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i> Lengkapi Data Anda </h2>


                        <div class="row">
                            <div class="col-sm-12" ng-controller="DropDownCtrl">
                                {!! Form::open(array('url' => 'auth/legal-action', 'class' => 'form-horizontal')) !!}
                                    <fieldset>

                                        <!-- Text input-->

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

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div class="termbox mb10">

                                                        Dengan menekan Update Profile, saya mengkonfirmasi telah menyetujui <a href="terms-conditions.html">Syarat dan Ketentuan, serta Kebijakan Privasi</a> Betawaran.

                                                </div>
                                                <div style="clear:both"></div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i> Update Profile
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
