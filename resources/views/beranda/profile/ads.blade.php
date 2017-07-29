@extends('layouts.app-home')

@section('style')
<link href="/mytuta/css/alert.css" rel="stylesheet">
@endsection

@section('script')
<!-- include custom script for ads table [select all checkbox]  -->
<script>

    function checkAll(bx) {
        var chkinput = document.getElementsByTagName('input');
        for (var i = 0; i < chkinput.length; i++) {
            if (chkinput[i].type == 'checkbox') {
                chkinput[i].checked = bx.checked;
            }
        }
    }

});

</script>
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
                        <h2 class="title-2"><i class="icon-docs"></i> Iklan Saya </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    <input type="checkbox" onclick="checkAll(this)" id="checkAll">
                                    Pilih: Semua | <a href="#" class="btn btn-xs btn-danger">Hapus <i
                                        class="glyphicon glyphicon-remove "></i></a> </label>

                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right">Cari <br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>

                                        <div class="col-xs-7 searchpan">
                                            <input type="text" class="form-control" id="filter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th> Foto</th>
                                    <th data-sort-ignore="true"> Detail Iklan</th>
                                    <th> Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($myads as $value)
                                <tr>
                                    <td style="width:2%" class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td style="width:14%" class="add-img-td"><a href="#"><img
                                            class="thumbnail  img-responsive"
                                            src="/images/product/thumbnail/{{$value->foto1}}"
                                            alt="img"></a></td>
                                    <td style="width:74%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="ads-details.html" title="Brend New Nexus 4">{{$value->product_title}}</a> </strong></p>

                                            <p><strong> Iklan Sejak </strong>:
                                                {{ Ads::jam($value->sundul_at) }} <strong>Dilihat </strong>: 221 Kali
                                            </p>
                                            <div><strong>{{Ads::harga($value->product_price,$value->nego)}}</strong></div>
                                        </div>
                                    </td>

                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>
                                            <p><a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
                                            {!! Form::open(['route' => ['sundul.update', $value->id], 'method' => 'put']) !!}
                                            <p><button class="btn btn-primary btn-xs" onClick="return confirm('Benar ingin menyundul?')"> <i class=" fa fa-futbol-o"></i> Sundul
                                            </button></p>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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
