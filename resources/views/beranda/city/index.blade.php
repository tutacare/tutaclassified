@extends('layouts.app-home')

@section('content')
<!-- /.header -->
    <div class="search-row-wrapper">
        <div class="container text-center">
            <div class="col-sm-3">
                <input class="form-control keyword" type="text" placeholder="e.g. Handphone">
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="category" id="search-category">
                    <option selected="selected" value="">Semua Kategori</option>
                    @foreach($ads_category as $value)
                    <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> -
                        {{$value->category}} -
                    </option>
                        @foreach(Ads::get($value->id,'subcategory') as $val)
                        <option value="Cars"> {{$val->name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="location" id="id-location">
                    <option selected="selected" value="">Semua Kota</option>
                    @foreach($ads_province as $value)
                    <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> -
                        {{$value->province}} -
                    </option>
                        @foreach(Ads::get($value->id,'city') as $val)
                          <option value="New York"> {{$val->city}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">

                            <div class="categories-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Semua Kategori</a></strong></h5>
                                <ul class=" list-unstyled">
                                    @foreach($ads_category as $value)
                                    <li><a href="/category/{{$value->slug}}"><span
                                            class="title">{{$value->category}}</span><span class="count">&nbsp;{{Ads::get($value->slug, 'count')}}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/.categories-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Rentang Harga</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="2000" id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="3000" id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Lokasi</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                  @foreach($ads_city as $value)
                                    <li><a href="/category/{{$city->slug}}/{{$value->slug}}/city"> {{$value->city}} </a></li>
                                  @endforeach
                                </ul>
                            </div>
                            <!--/.locations-list-->
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">

                    <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">{{$city->city}} <span
                                        class="badge">{{$ads_count}}</span></a></li>
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
                            <div class="pull-left col-xs-10">
                                <div class="breadcrumb-list">
                                  <ul>
                                @foreach($ads_sub_cat as $value)
                                  <div class="col-xs-3">
                                  <li><a href="/category/{{$city->slug}}/{{$value->slug}}/sub">{{$value->name}}</a></li>
                                </div>
                                @endforeach
                              </ul>
                                </div>
                            </div>
                            <div class="pull-right col-xs-2 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-lg-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Filters
                                    </a>
                                </li>
                                <!-- <li>
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
                                            by </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="" rel="nofollow">Relevance</a></li>
                                            <li><a href="" rel="nofollow">Date</a></li>
                                            <li><a href="" rel="nofollow">Company</a></li>
                                        </ul>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->


                        <div class="adds-wrapper">
                          @foreach($ads as $value)
                            <div class="item-list">


                                <div class="col-sm-2 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                            class="fa fa-camera"></i> {{Ads::fotoCount($value->foto1,$value->foto2,$value->foto3,$value->foto4,$value->foto5)}} </span> <a href="/ads/{{$value->slug}}"><img
                                            class="thumbnail no-margin img-responsive"  style="width:500px; height:100px;" src="/images/product/thumbnail/{{$value->foto1}}"
                                            alt="img"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-sm-7 add-desc-box">
                                    <div class="add-details">
                                        <h5 class="add-title"><a href="/ads/{{$value->slug}}">
                                            {{ $value->product_title }} </a></h5>
                                        <span class="info-row">
                                           <!-- <span class="add-type business-ads tooltipHere"
                                                                      data-toggle="tooltip" data-placement="right"
                                                                      title="Bussines Ads">B </span>  -->
                                                                      <span class="date"><i
                                                class=" icon-clock"> </i> {{ Ads::jam($value->sundul_at) }} </span> - <span
                                                class="category">{{$value->name}} </span>- <span class="item-location"><i
                                                class="fa fa-map-marker"></i> {{$value->city}} </span> </span></div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-sm-3 text-right  price-box">
                                    <h2 class="item-price"> Rp. {{number_format($value->product_price, 0, ',', '.')}} @if ($value->nego == 1) Nego @endif </h2>
                                    <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i>
                                        <span>Sundul</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i
                                        class="fa fa-heart"></i> <span>Save</span> </a></div>
                                <!--/.add-desc-box-->
                            </div>
                            @endforeach
                            <!--/.item-list-->
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
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
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

@endsection
