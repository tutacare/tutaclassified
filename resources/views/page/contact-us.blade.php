@extends('layouts.app-home')

@section('content')
<div class="intro-inner">
        <div class="contact-intro">
            <div class="w100 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26081603.294420466!2d-95.677068!3d37.06250000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1423809000824"
                        width="100%" height="350" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
        <!--/.contact-intro || map end-->

    </div>
    <!-- /.intro-inner -->

<div class="main-container">
       <div class="container">
           <div class="row clearfix">
               <div class="col-md-4">
                   <div class="contact_info">
                       <h5 class="list-title gray"><strong>Contact us</strong></h5>

                       <div class="contact-info ">
                           <div class="address">
                               <p class="p1">220 Fifth Ave</p>

                               <p class="p1">2nd Flr. New York, NY 10001 </p>

                               <p>Email: info@@demos.org</p>

                               <p>Toll Free: 212-633-1405</p>

                               <p>&nbsp;</p>

                               <div>

                                   <p><strong><a href="#">Get a Quote</a></strong></p>

                                   <p><strong> <a href="login.html">Client Area Login</a></strong></p>

                                   <p><strong> <a href="#skypeid" class="skype">Live Chat</a></strong></p>

                                   <p><strong> <a href="faq.html">Knowledge Base</a></strong></p>

                               </div>
                           </div>
                       </div>

                       <div class="social-list"><a target="_blank" href="https://twitter.com/"><i
                               class="fa fa-twitter fa-lg "></i></a>
                           <a target="_blank" href="https://www.facebook.com/"><i
                                   class="fa fa-facebook fa-lg "></i></a>
                           <a target="_blank" href="https://plus.google.com"><i
                                   class="fa fa-google-plus fa-lg "></i></a>
                           <a target="_blank" href="https://www.pinterest.com/"><i class="fa fa-pinterest fa-lg "></i></a>
                       </div>
                   </div>
               </div>
               <div class="col-md-8">
                   <div class="contact-form">
                       <h5 class="list-title gray"><strong>Contact us</strong></h5>


                       <form class="form-horizontal" method="post">
                           <fieldset>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="firstname" name="name" type="text" placeholder="First Name"
                                                      class="form-control">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="lastname" name="name" type="text" placeholder="Last  Name"
                                                      class="form-control">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="companyname" name="name" type="text"
                                                      placeholder="Company Name" class="form-control">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="email" name="email" type="text" placeholder="Email Address"
                                                      class="form-control">
                                           </div>
                                       </div>
                                   </div>


                                   <div class="col-lg-12">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <textarea class="form-control" id="message" name="message"
                                                         placeholder="Enter your massage for us here. We will get back to you within 2 business days."
                                                         rows="7"></textarea>
                                           </div>
                                       </div>


                                       <div class="form-group">
                                           <div class="col-md-12 ">
                                               <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                           </div>
                                       </div>


                                   </div>

                               </div>


                           </fieldset>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /.main-container -->


@endsection
