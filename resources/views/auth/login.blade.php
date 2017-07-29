@extends('layouts.app-home')

@section('style')
<link href="/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">
@endsection

@section('content')
<div class="main-container">
       <div class="container">
           <div class="row">
               <div class="col-sm-5 login-box">
                   <div class="panel panel-default">
                       <div class="panel-intro text-center">
                           <h2 class="logo-title">
                               <!-- Original Logo will be placed here  -->
                              <img src="/betawaran/logo.png">
                           </h2>
                       </div>
                       <div class="panel-body">
                         <form role="form" method="POST" action="{{ url('/login') }}">
                             {!! csrf_field() !!}
                               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                   <label for="sender-email" class="control-label">Email:</label>

                                   <div class="input-icon"><i class="icon-user fa"></i>
                                              <input id="sender-email" type="email" class="form-control email" placeholder="Email" name="email" value="{{ old('email') }}">

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                   </div>
                               </div>
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <label for="user-pass" class="control-label">Password:</label>

                                   <div class="input-icon"><i class="icon-lock fa"></i>
                                              <input type="password" class="form-control" placeholder="Password" id="user-pass" name="password">

                                              @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
                                   </div>
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-sign-in"></i> Login
                                   </button>
                               </div>
                           </form>
                       </div>
                       <div class="panel-footer">

                           <div class="checkbox pull-left">
                               <label> <input type="checkbox" value="1" name="remember" id="remember"> Ingat saya</label>
                           </div>


                           <p class="text-center pull-right"><a href="{{ url('/password/reset') }}"> Lupa Password? </a>
                           </p>

                           <div style=" clear:both"></div>
                           <div class="text-info text-center"><strong>ATAU</strong></div>
                           <br />
                           <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
                             <span class="fa fa-facebook"></span> Login Dengan Facebook
                           </a>
                       </div>
                   </div>
                   <div class="login-box-btm text-center">
                       <p> Tidak Punya Akun? <br>
                           <a href="/register"><strong>Daftar !</strong> </a></p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /.main-container -->
@endsection
