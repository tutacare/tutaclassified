@extends('layouts.app-home')

@section('style')
<link href="/mytuta/css/alert.css" rel="stylesheet">
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="BETAWARAN - Tawar Menawar Disini Aja" />
<meta property="og:description" content="BETAWARAN.COM menyediakan media yang mudah, cepat dan gratis bagi para penjual untuk memasang iklan dan sekaligus bagi pembeli untuk mencari beragam produk barang bekas dan barang baru untuk kebutuhan sehari-hari." />
<meta property="og:image" content="{{ url('/betawaran/imgsocial.jpg') }}" />
@endsection

@section('script')
<script>
$("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#success-alert").alert('close');
});
</script>
@endsection

@section('content')
@if (Session::has('message'))
<div class="alert tutaalert" role="alert" id="success-alert">
  <button type="button" class="closet" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message') }}
</div>
@endif
    <div class="intro" style="background-image: url(images/bg3.jpg);">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> Cari Kebutuhan Anda </h1>

                    <p class="sub animateme fittext3 animated fadeIn"> Cari kebutuhan sehari-hari anda di Betawaran dalam hitungan menit </p>

                    <div class="row search-row animated fadeInUp">
                      <form role="search" method="GET" action="{{ url('/search/key') }}">
                        <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                            <i class="icon-location-2 icon-append"></i>
                            <input type="text" name="city" id="autocomplete-ajax"
                                   class="form-control locinput input-rel searchtag-input has-icon"
                                   placeholder="Kota ..." value="" required>

                        </div>
                        <div class="col-lg-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
                            <input type="text" name="q" value="{{$query_search or ''}}"  class="form-control has-icon"
                                   placeholder="Saya mencari ..." value="" required>
                        </div>
                        <div class="col-lg-4 col-sm-4 search-col">
                            <button class="btn btn-primary btn-search btn-block"><i
                                    class="icon-search"></i><strong>Cari</strong></button>
                        </div>
                      </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <div class="main-container">
        <div class="container">

            <div class="col-lg-12 content-box ">
                <div class="row row-featured row-featured-category">
                    <div class="col-lg-12  box-title no-border">
                        <div class="inner"><h2><span>Lihat berdasarkan</span>
                            Kategori <a href="/category" class="sell-your-item"> Selengkapnya <i
                                    class="  icon-th-list"></i> </a></h2>
                        </div>
                    </div>

                    @foreach($category as $value)
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="/category/{{$value->slug}}"><img src="/images/category/{{$value->foto}}" class="img-responsive" alt="img">
                            <h6> {{$value->category}} </h6></a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="clear: both"></div>

            <div class="col-lg-12 content-box ">
                <div class="row row-featured">
                    <div class="col-lg-12  box-title ">
                        <div class="inner"><h2><span>Produk </span>
                            Teratas <a href="/category" class="sell-your-item"> Selengkapnya <i
                                    class="  icon-th-list"></i> </a></h2>


                        </div>
                    </div>

                    <div style="clear: both"></div>

                    <div class=" relative  content featured-list-row clearfix">

                        <nav class="slider-nav has-white-bg nav-narrow-svg">
                            <a class="prev">
                                <span class="nav-icon-wrap"></span>

                            </a>
                            <a class="next">
                                <span class="nav-icon-wrap"></span>
                            </a>
                        </nav>

                        <div class="no-margin featured-list-slider ">
                          @foreach($product as $value)
                          <div class="item">
                            <a href="/ads/{{$value->slug}}">
                              <span class="price">{{$value->user->city->city}}</span>
                            <span class="item-carousel-thumb">
                            <img class="img-responsive" src="/images/product/thumbnail/{{$value->foto1}}" alt="img">
                            </span>
                            <span class="item-name"> {{$value->product_title}}  </span>
                            <span class="price">  Rp. {{number_format($value->product_price, 0, ',', '.')}} @if ($value->nego == 1) Nego @endif</span>
                            </a>
                          </div>
                          @endforeach

                        </div>


                    </div>

                </div>
            </div>


            <div class="col-lg-12 content-box ">
                <div class="row row-featured">

                    <div style="clear: both"></div>

                    <div class=" relative  content  clearfix">


                        <div class="">
                            <div class="tab-lite">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1"
                                                                              role="tab" data-toggle="tab"><i
                                            class="icon-location-2"></i> Lokasi Populer</a></li>

                                    <!-- <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab"
                                                               data-toggle="tab"><i class="icon-th-list"></i> Kategori Populer</a>
                                    </li> -->
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">

                                        <div class="col-lg-12 tab-inner">

                                            <div class="row">
                                              @foreach($city as $key => $value)
                                                @if($key == 0)
                                                <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                                  <li><a href="/city/{{$value->slug}}">{{$value->city}}</a></li>
                                                @elseif($key == 7)
                                                  <li><a href="/city/{{$value->slug}}">{{$value->city}}</a></li>
                                                  </ul>
                                                @elseif($key == 8 || $key == 16  || $key == 24)
                                                  <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                  <li><a href="/city/{{$value->slug}}">{{$value->city}}</a></li>
                                                @elseif($key == 15 || $key == 23 || $key == 31)
                                                    <li><a href="/city/{{$value->slug}}">{{$value->city}}</a></li>
                                                    </ul>
                                                @else
                                                  <li><a href="/city/{{$value->slug}}">{{$value->city}}</a></li>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>


                                    </div>

                                    <!-- <div role="tabpanel" class="tab-pane" id="tab2">

                                      <div class="col-lg-12 tab-inner">

                                          <div class="row">
                                            @foreach($product as $key => $value)
                                              @if($key == 0)
                                              <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                                <li><a href="category.html">{{$value->product_title}}</a></li>
                                              @elseif($key == 7)
                                                <li><a href="category.html">{{$value->product_title}}</a></li>
                                                </ul>
                                              @elseif($key == 8 || $key == 16  || $key == 24)
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                <li><a href="category.html">{{$value->product_title}}</a></li>
                                              @elseif($key == 15 || $key == 23 || $key == 31)
                                                  <li><a href="category.html">{{$value->product_title}}</a></li>
                                                  </ul>
                                              @else
                                                <li><a href="category.html">{{$value->product_title}}</a></li>
                                              @endif
                                              @endforeach
                                          </div>
                                      </div>
                                    </div> -->

                                </div>

                            </div>

                        </div>


                    </div>

                </div>
            </div>


            <div class="row">


                <div class="col-sm-9 page-content col-thin-right">
                    <div class="inner-box category-content">
                        <h2 class="title-2">Temukan Produk Yang Anda Butuhkan </h2>

                        <div class="row">
                            <?php $i = 0; ?>
                              @foreach($category_list as $key => $value)
                              @if($i < 6)
                                @if(Ads::subCatLimit($value->id, 6)->count() >= 6)
                                <div class="col-md-4 col-sm-4 ">
                                  <div class="cat-list">
                                      <h3 class="cat-title"><a href="/category/{{$value->slug}}"><i class="fa fa-{{$value->symbol}} ln-shadow"></i>
                                        {{Ads::get($value->slug, 'count')}}<span class="count">{{$value->category}}</span> </a>

                                          <span data-target=".cat-id-{{$key+1}}" data-toggle="collapse"
                                                class="btn-cat-collapsed collapsed">   <span
                                                  class=" icon-down-open-big"></span> </span>
                                      </h3>
                                      <ul class="cat-collapse collapse in cat-id-{{$key+1}}">
                                        @foreach(Ads::subCatLimit($value->id, 6)->get() as $sub_cat)
                                          <li><a href="/category/{{$value->slug}}/{{$sub_cat->slug}}/sub">{{str_limit($sub_cat->name, 20)}}</a></li>
                                        @endforeach
                                      </ul>
                                  </div>
                                </div>
                                <?php $i++; ?>
                                @endif
                              @endif
                                @endforeach


                            <div class="col-md-4 col-sm-4   last-column">

                            </div>
                        </div>
                    </div>

                    <div class="inner-box has-aff relative">
                        <a class="dummy-aff-img" href="/category"><img src="images/aff2.jpg" class="img-responsive"
                                                                           alt=" aff"> </a>

                    </div>
                </div>
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/site/app.jpg" alt="tv"></a>
                            </div>
                        </div>
                        <div class="inner-box">
                            <h2 class="title-2">Kategori Terpopuler </h2>

                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                  @foreach($category_10 as $value)
                                    <li><a href="/category/{{$value->slug}}"> {{$value->category}} ({{Ads::get($value->slug, 'count')}})</a></li>
                                  @endforeach

                                </ul>
                            </div>
                        </div>

                        <!-- <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div> -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

    <div class="page-info hasOverly" style="background: url(images/bg.jpg); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{Ads::count('users')}}</span></h5>

                                    <div class="iconbox-wrap-text">Pengguna</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{Ads::count('categories')}}</span></h5>

                                    <div class="iconbox-wrap-text">Kategori</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{Ads::count('cities')}}</span></h5>

                                    <div class="iconbox-wrap-text">Lokasi</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-th-list"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{Ads::count('products')}}</span></h5>

                                    <div class="iconbox-wrap-text"> Produk</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <div class="page-bottom-info-content text-center">
                <h1>Jika Anda memiliki pertanyaan, silahkan hubungi layanan pelanggan kami di email: info@betawaran.com</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span class="hide-xs color50">Email:</span> info@betawaran.com </a>
            </div>

        </div>
    </div>
@endsection
