@extends('layouts.app-home')

@section('script')
<!-- include jquery file upload plugin  -->
<script src="/assets/js/fileinput.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // initialize with defaults
    $("#input-upload-img1").fileinput();
    $("#input-upload-img2").fileinput();
    $("#input-upload-img3").fileinput();
    $("#input-upload-img4").fileinput();
    $("#input-upload-img5").fileinput();
$(document).ready(function() {


    //hanya angka
    $("#product_price").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter
          // http://keycode.info/
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
               // Allow: Ctrl+A, Command+A
              (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
               // Allow: home, end, left, right, down, up
              (e.keyCode >= 35 && e.keyCode <= 40)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }

      });
    // tambahkan koma pada harga
   $('#product_price').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40){
     event.preventDefault();
    }

    $(this).val(function(index, value) {
        value = value.replace(/,/g,''); // remove commas from existing input
        return numberWithCommas(value); // add commas back in
    });
  });

  function numberWithCommas(x) {
      var parts = x.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return parts.join(".");
  }
  //.hanya angka
});
</script>
<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
<script type="text/javascript" src="/mytuta/js/post-ads.js"></script>
<script src="/template/plugins/ckeditor/ckeditor.js"></script>
<script>
// $("#description").keydown(function(){
//     el = $(this);
//     if(el.val().length >= 600){
//         el.val( el.val().substr(0, 600) );
//     } else {
//         $("#charNum").text(0+el.val().length);
//     }
// });
    CKEDITOR.replace( 'description' );
    CKEDITOR.instances.description.on('contentDom', function() {
              CKEDITOR.instances.description.document.on('keydown', function(event) {
                el = $(this);
                if(el.val().length >= 600){
                    el.val( el.val().substr(0, 600) );
                } else {
                    $("#charNum").text(0+el.val().length);
                }
              });
            });
</script>
@endsection

@section('html')ng-app="dropdown"@endsection

@section('content')
<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Pasang Produk Anda, Gratis!</strong></h2>

                        <div class="row">
                            <div class="col-sm-12" ng-controller="DropDownCtrl">
                              @if (Session::has('message'))
                                  <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ Session::get('message') }}
                                  </div>
                              @endif
                                  {!! Form::open(array('url' => 'post-ads', 'files' => true, 'class' => 'form-horizontal')) !!}
                                    <fieldset>

                                      <div class="form-group">
                                          <label class="col-md-3 control-label">&nbsp;</label>

                                          <div class="col-md-8">

                                              {!! '<font color="red">' . Html::ul($errors->all()) . '</font>' !!}

                                          </div>
                                      </div>
                                        <!-- Select Basic -->
                                        <div class="form-group required {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label">Kategori <sup>*</sup></label>

                                            <div class="col-md-8">
                                               <select name="category_id" class='form-control' id='selectbasic'
                                               ng-model="filter.valuecategory"
                                               ng-change="changeMe(filter.valuecategory)"
                                               ng-options="value.id as value.category for value in categorylists">
                                               <option value="">Pilih Kategori</option>
                                               </select>
                                               @if ($errors->has('category_id'))
                                                   <span class="help-block">
                                                       <strong>{{ $errors->first('category_id') }}</strong>
                                                   </span>
                                               @endif
                                            </div>
                                        </div>

                                        <div class="form-group required {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label">Detail <sup>*</sup></label>

                                            <div class="col-md-8">
                                              <select name="sub_category_id" class='form-control' id='selectbasic'
                                                ng-model="filter.valuesubcategory"
                                                ng-options="value.id as value.name for value in subcategorylists">
                                                <option value="">Pilih Detail</option>
                                              </select>
                                              @if ($errors->has('sub_category_id'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('sub_category_id') }}</strong>
                                                  </span>
                                              @endif
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Judul Produk</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle" name="product_title" placeholder="Judul Produk"
                                                       class="form-control input-md" required="" type="text">

                                            </div>
                                        </div>

                                        <!-- Multiple Radios (inline) -->
                                       <div class="form-group">
                                           <label class="col-md-3 control-label" for="radios">Kondisi</label>

                                           <div class="col-md-4">
                                               <label class="radio-inline" for="radios-0">
                                                   <input name="condition" id="radios-0" value="0" checked="checked"
                                                          type="radio">
                                                   Bekas </label>
                                               <label class="radio-inline" for="radios-1">
                                                   <input name="condition" id="radios-1" value="1" type="radio">
                                                   Baru </label>
                                           </div>
                                       </div>


                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Keterangan </label>

                                            <div class="col-md-8">
                                                <textarea class="form-control runway" id="description" name="product_description">Keterangan, Buat seunik mungkin</textarea>
                                                <span class="help-block">Sebaiknya minimal 60 karakter. <span class="pull-right" id="charNum">0</span></span>
                                            </div>
                                        </div>

                                        <!-- Prepended text-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">Harga</label>

                                            <div class="col-md-4">
                                                <div class="input-group"><span class="input-group-addon">Rp</span>
                                                    <input id="product_price" name="product_price" class="form-control"
                                                           autocomplete="off" placeholder="Harga" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        {!! Form::checkbox('nego', 'true') !!}
                                                        Nego </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- photo -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea"> Gambar Utama</label>

                                            <div class="col-md-8">
                                                <div class="mb10">
                                                    <input id="input-upload-img1" name="foto1" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input id="input-upload-img2" name="foto2" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input id="input-upload-img3" name="foto3" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input id="input-upload-img4" name="foto4" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <div class="mb10">
                                                    <input id="input-upload-img5" name="foto5" type="file" class="file"
                                                           data-preview-file-type="text">
                                                </div>
                                                <p class="help-block">Minimal 1 Gambar dan Anda bisa masukan hingga 5 foto. Gunakan gambar nyata produk Anda. <em>Ukuran ideal adalah 816p x 460p</em></p>
                                            </div>
                                        </div>



                                        <!-- Button  -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><button id="button1id"
                                                                     class="btn btn-success btn-lg">Submit</button></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>

                        <div class="panel sidebar-panel">
                            <div class="panel-heading uppercase">
                                <small><strong>How to sell quickly?</strong></small>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
                                    <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--/.reg-sidebar-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

@endsection
