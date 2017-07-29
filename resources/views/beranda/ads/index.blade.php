@extends('layouts.app-home')

@section('title_share')
{{$ads->product_title}} by {{ $ads->user->name }}
@endsection

@section('title')
{{$ads->product_title}}
@endsection
@section('description')
{{ str_limit(strip_tags($ads->product_description), 255) }}
@endsection
@section('author')
{{ $ads->user->name }}
@endsection
@section('image_source')
<link rel="image_src" href="{{ url('/images/product/'.$ads->foto1) }}" />
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $ads->product_title }}" />
<meta property="og:description" content="{{ str_limit(strip_tags($ads->product_description), 255) }}" />
<meta property="og:image" content="{{ url('/images/product/'.$ads->foto1) }}" />
@if($ads->foto2)
<meta property="og:image" content="{{ url('/images/product/'.$ads->foto2) }}" />
@endif
@if($ads->foto3)
<meta property="og:image" content="{{ url('/images/product/'.$ads->foto3) }}" />
@endif
@if($ads->foto4)
<meta property="og:image" content="{{ url('/images/product/'.$ads->foto4) }}" />
@endif
@if($ads->foto5)
<meta property="og:image" content="{{ url('/images/product/'.$ads->foto5) }}" />
@endif
@endsection

@section('style')
<!-- bxSlider CSS file -->
    <link href="/assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>
@endsection

@section('script')
<!-- include carousel slider plugin  -->
<script src="/assets/js/owl.carousel.min.js"></script>

<!-- bxSlider Javascript file -->
<script src="/assets/plugins/bxslider/jquery.bxslider.min.js"></script>
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

</script>
@endsection

@section('content')
<div class="main-container">
        <div class="container">
            <ol class="breadcrumb pull-left">
                <li><a href="/"><i class="icon-home fa"></i></a></li>
                <li><a href="/category">Kategori</a></li>
                <li><a href="/category/{{$ads->subCategory->category->slug}}">{{$ads->subCategory->category->category}}</a></li>
                <li class="active">{{$ads->subCategory->name}}</li>
            </ol>
            <div class="pull-right backtolist"><a href="{{url()->previous()}}"> <i
                    class="fa fa-angle-double-left"></i> Kembali</a></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> {{$ads->product_title}}
                            <small class="label label-default adlistingtype">{{$ads->user->city->city}}</small>
                        </h2>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> {{ Ads::jam($ads->sundul_at) }} </span> - <span
                                class="category">{{$ads->subCategory->category->category}} - {{$ads->subCategory->name}} </span>- <span class="item-location"><i
                                class="fa fa-map-marker"></i> {{$ads->user->city->city}} </span> </span>

                        <div class="ads-image">
                            <h1 class="pricetag"> Rp. {{number_format($ads->product_price, 0, ',', '.')}} @if ($ads->nego == 1) Nego @endif</h1>
                            <ul class="bxslider">
                                <li><img src="/images/product/{{$ads->foto1}}" alt="{{$ads->product_title}}" class="img-responsive" /></li>
                                @if($ads->foto2 <> null)
                                   <li><img src="/images/product/{{$ads->foto2}}"  alt="{{$ads->product_title}}" class="img-responsive" /></li>
                                @endif
                                @if($ads->foto3 <> null)
                                  <li><img src="/images/product/{{$ads->foto3}}"  alt="{{$ads->product_title}}" class="img-responsive" /></li>
                                @endif
                                @if($ads->foto4 <> null)
                                  <li><img src="/images/product/{{$ads->foto4}}"  alt="{{$ads->product_title}}" class="img-responsive" /></li>
                                @endif
                                @if($ads->foto5 <> null)
                                  <li><img src="/images/product/{{$ads->foto5}}"  alt="{{$ads->product_title}}" class="img-responsive" /></li>
                                @endif
                            </ul>
                            <div id="bx-pager">
                                <a class="thumb-item-link" data-slide-index="0" href=""><img
                                        src="/images/product/{{$ads->foto1}}" alt="img"/></a>
                                @if($ads->foto2 <> null)
                                  <a class="thumb-item-link" data-slide-index="1" href=""><img
                                        src="/images/product/{{$ads->foto2}}" alt="img"/></a>
                                @endif
                                @if($ads->foto3 <> null)
                                  <a class="thumb-item-link" data-slide-index="2" href=""><img
                                        src="/images/product/{{$ads->foto3}}" alt="img"/></a>
                                @endif
                                @if($ads->foto4 <> null)
                                  <a class="thumb-item-link" data-slide-index="3" href=""><img
                                        src="/images/product/{{$ads->foto4}}" alt="img"/></a>
                                @endif
                                @if($ads->foto5 <> null)
                                  <a class="thumb-item-link" data-slide-index="4" href=""><img
                                        src="/images/product/{{$ads->foto5}}" alt="img"/></a>
                                @endif
                            </div>
                        </div>
                        <!--ads-image-->

                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Keterangan</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    {!! $ads->product_description !!}
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Harga:</strong> Rp. {{number_format($ads->product_price, 0, ',', '.')}} @if ($ads->nego == 1) Nego @endif</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Kategori:</strong> {{$ads->subCategory->category->category}}</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Jenis:</strong> {{$ads->subCategory->name}}</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Lokasi:</strong> {{$ads->user->city->city}} </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Kondisi:</strong> {{Ads::condition($ads->condition)}}</p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li><a href="/{{$ads->user->username}}"> <i class=" fa fa-user"></i> {{$ads->user->name}} </a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#myModal"> <i class="fa fa-share-alt"></i> Bagikan </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                    class="fa icon-info-circled-alt"></i> Laporkan Penyalahgunaan </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left"><a class="btn  btn-default" data-toggle="modal"
                                                                     href="#contactAdvertiser"><i
                                    class=" icon-mail-2"></i> Kirim Pesan </a> <a class="btn  btn-info"><i
                                    class=" icon-phone-1"></i> {{$ads->user->phone}} </a></div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-sm-3  page-sidebar-right">
                    <aside>
                        <div class="panel sidebar-panel panel-contact-seller">
                            <div class="panel-heading">Kontak Penjual</div>
                            <div class="panel-content user-info">
                                <div class="panel-body text-center">
                                    <div class="seller-info">
                                        <h3 class="no-margin">{{$ads->user->name}}</h3>

                                        <p>Lokasi: <strong>{{$ads->user->city->city}}</strong></p>
                                        <p>Iklan Sejak: <strong>{{ Ads::jam($ads->sundul_at) }}</strong></p>
                                        <p>Dilihat: <strong>{{ $ads->viewer }}</strong> Kali</p>
                                    </div>
                                    <div class="user-ads-action"><a href="#contactAdvertiser" data-toggle="modal"
                                                                    class="btn   btn-default btn-block"><i
                                            class=" icon-mail-2"></i> Kirim Pesan </a> <a
                                            class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> {{$ads->user->phone}}
                                    </a></div>
                                </div>
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Bagikan</h4>
        </div>
        <div class="modal-body text-center">
          @include('somacro.somacro')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    </div>
    <!-- /.main-container -->
    <!-- Large modal -->

@endsection
