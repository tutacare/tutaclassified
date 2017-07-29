<div class="collapse-box">
    <h5 class="collapse-title no-border"> Profil <a href="#MyClassified"
                                                           data-toggle="collapse"
                                                           class="pull-right"><i
            class="fa fa-angle-down"></i></a></h5>

    <div class="panel-collapse collapse in" id="MyClassified">
        <ul class="acc-list">
            <li><a class="active" href="/user/profile"><i class="icon-home"></i>
                Personal Home </a></li>

        </ul>
    </div>
</div>

<div class="collapse-box">
    <h5 class="collapse-title"> Produk Saya <a href="#MyAds" data-toggle="collapse"
                                          class="pull-right"><i
            class="fa fa-angle-down"></i></a></h5>

    <div class="panel-collapse collapse in" id="MyAds">
        <ul class="acc-list">
            <li><a href="/user/ads"><i class="icon-docs"></i> Iklan Saya <span
                    class="badge">{{$myads_count}}</span> </a></li>
            <li><a href="/user/ads-pending"><i
                    class="icon-hourglass"></i> Iklan Pending <span
                    class="badge">{{$myads_pending_count}}</span></a></li>

        </ul>
    </div>
</div>
