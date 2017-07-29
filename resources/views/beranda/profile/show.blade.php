@extends('layouts.app-home')

@section('title_share')
{{ $user->name }}
@endsection

@section('title')
{{ $user->name }}
@endsection
@section('description')
Dapatkan produk dari {{ $user->name }} dan hubungi segera {{ $user->name }} Untuk mendapatkan penawaran yang spesial di Kota {{$user->city->city}} | {{$user->city->province->province}}
@endsection
@section('author')
{{ $user->name }}
@endsection
@section('image_source')
<link rel="image_src" href="{{ url('/images/user/'.$user->foto) }}" />
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $user->name }}" />
<meta property="og:description" content="Dapatkan produk dari {{ $user->name }} dan hubungi segera {{ $user->name }} Untuk mendapatkan penawaran yang spesial di Kota {{$user->city->city}} | {{$user->city->province->province}}" />
<meta property="og:image" content="{{ url('/images/user/'.$user->foto) }}" />
@endsection

@section('content')
<div class="main-container inner-page">
       <div class="container">
           <div class="section-content">
               <div class="inner-box ">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="seller-info seller-profile">
                               <div class="seller-profile-img">
                                   <a><img src="{{Ads::getImage($user->foto)}}" class="img-responsive thumbnail" alt="img"> </a>
                               </div>
                               <h3 class="no-margin no-padding link-color uppercase ">{{$user->name}}</h3>

                               <div class="text-muted">
                                   {{$user->user_info or 'Informasi Pengguna'}}
                               </div>
                               <div class="user-ads-action">
                                   <a class="btn btn-sm btn-success " data-toggle="modal"
                                      href="#contactAdvertiser"><i class=" icon-mail-2"></i> Kirim Pesan </a>
                               </div>

                               <div class="seller-social-list">

                                   <ul class="share-this-post">


                                       <li><a class="google-plus"><i class="fa fa-google-plus"></i></a>
                                       </li>
                                       <li><a class="facebook"><i class="fa fa-facebook"></i></a>
                                       </li>
                                       <li><a><i class="fa fa-twitter"></i></a>
                                       </li>
                                       <li><a class="pinterest"><i class="fa fa-pinterest"></i></a>
                                       </li>

                                   </ul>
                               </div>
                           </div>


                       </div>
                       <div class="col-sm-6">

                           <div class="seller-contact-info">

                               <h3 class="no-margin uppercase color-danger"> Informasi Kontak </h3>

                               <dl class="dl-horizontal">
                                  @if($user->address <> null)
                                     <dt>Address:</dt>
                                     <dd class="contact-sensitive"> {{$user->address}}
                                     </dd>
                                  @endif
                                    <dt>Kota:</dt>
                                    <dd class="contact-sensitive">{{$user->city->city}} | {{$user->city->province->province}}</dd>
                                   <dt>No. Telp:</dt>
                                   <dd class="contact-sensitive">{{$user->phone}}</dd>
                               </dl>


                           </div>

                       </div>
                   </div>

               </div>

               <div class="section-block">
                   <div class="row">
                       <div class="col-sm-9 col-thin-left page-content ">

                           <div class="category-list">
                               <div class="tab-box ">

                                   <!-- Nav tabs -->
                                   <ul class="nav nav-tabs add-tabs" role="tablist">
                                       <li class="active"><a href="#allAds" role="tab" data-toggle="tab"> Produk
                                           <span class="badge">{{$product->count()}}</span></a></li>

                                   </ul>
                                   <div class="tab-filter">
                                       <select class="selectpicker" data-style="btn-select" data-width="auto">
                                         <option>Urut Berdasarkan</option>
                                         <option>Harga: Murah ke Mahal</option>
                                         <option>Harga: Mahal ke Murah</option>
                                       </select>
                                   </div>
                               </div>
                               <!--/.tab-box-->

                               <div class="listing-filter">
                                   <div class="pull-left col-xs-6">
                                      &nbsp;
                                   </div>
                                   <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                           class="list-view active"><i class="  icon-th"></i></span> <span
                                           class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                           class="grid-view "><i class=" icon-th-large "></i></span></div>
                                   <div style="clear:both"></div>
                               </div>
                               <!--/.listing-filter-->


                               <div class="adds-wrapper">
                                 @foreach($product->get() as $value)
                                   <div class="item-list">


                                       <div class="col-sm-2 no-padding photobox">
                                           <div class="add-image"><span class="photo-count"><i
                                                   class="fa fa-camera"></i> {{Ads::fotoCount($value->foto1,$value->foto2,$value->foto3,$value->foto4,$value->foto5)}} </span> <a href="/ads/{{$value->slug}}"><img
                                                   class="thumbnail no-margin" src="/images/product/thumbnail/{{$value->foto1}}"
                                                   alt="img"></a></div>
                                       </div>
                                       <!--/.photobox-->
                                       <div class="col-sm-7 add-desc-box">
                                           <div class="add-details">
                                               <h5 class="add-title"><a href="/ads/{{$value->slug}}">
                                                   {{ $value->product_title }} </a></h5>
                                               <!-- <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                                                             data-toggle="tooltip"
                                                                             data-placement="right"
                                                                             title="Business Ads">B </span> -->

                                                       <span class="date"><i class=" icon-clock"> </i> {{ Ads::jam($value->sundul_at) }} </span> - <span
                                                       class="category">{{$value->category}} </span>- <span
                                                       class="item-location">{{$value->name}} </span> </span>
                                           </div>
                                       </div>
                                       <!--/.add-desc-box-->
                                       <div class="col-sm-3 text-right  price-box">
                                           <h2 class="item-price"> Rp. {{number_format($value->product_price, 0, ',', '.')}} @if ($value->nego == 1) Nego @endif </h2>
                                           <a class="btn btn-danger  btn-sm make-favorite"> <i
                                                   class="fa fa-certificate"></i> <span>Sundul</span> </a> <a
                                               class="btn btn-default  btn-sm make-favorite"> <i
                                               class="fa fa-heart"></i> <span>Save</span> </a></div>
                                       <!--/.add-desc-box-->
                                   </div>
                                   <!--/.item-list-->
                                      @endforeach
                               </div>
                               <!--/.adds-wrapper-->

                               <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-plus"></i>
                                   Follow User </a></div>
                           </div>
                           <div class="pagination-bar text-center">
                               <ul class="pagination">
                                   <li class="active"><a href="#">1</a></li>
                                   <li><a href="#">2</a></li>
                                   <li><a href="#">3</a></li>
                                   <li><a href="#">4</a></li>
                                   <li><a href="#">5</a></li>
                                   <li><a href="#"> ...</a></li>
                                   <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
                               </ul>
                           </div>
                           <!--/.pagination-bar -->

                           <div class="post-promo text-center">
                               <h2> Apakah Anda memiliki barang untuk dijual ? </h2>
                               <h5>Jual produk Anda secara online GRATIS. Lebih mudah dari yang Anda pikirkan !</h5>
                               <a href="/post-ads" class="btn btn-lg btn-border btn-post btn-danger"><i class="fa fa-btn fa-plus"></i> Pasang Produk </a>
                           </div>
                           <!--/.post-promo-->

                       </div>


                       <div class="col-sm-3  page-sidebar-right">
                           <aside>

                                 <div class="inner-box no-padding">
                                     <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                                     src="images/site/app.jpg" alt="tv"></a>
                                     </div>
                                 </div>


                                 <div class="panel sidebar-panel">
                                     <div class="panel-heading">Tips Aman Untuk Pembeli</div>
                                     <div class="panel-content">
                                         <div class="panel-body text-left">
                                             <ul class="list-check">
                                                 <li> Ketemuan di tempat aman</li>
                                                 <li> Teliti sebelum membeli</li>
                                                 <li> Bayar setelah barang diterima</li>
                                             </ul>
                                             <p><a class="pull-right" href="#"> Selengkapnya <i
                                                     class="fa fa-angle-double-right"></i> </a></p>
                                         </div>
                                     </div>
                                 </div>
                               <!--/.categories-list-->
                           </aside>
                       </div>
                       <!--/.page-side-bar-->
                   </div>
               </div>


           </div>

       </div>
   </div>


@endsection
