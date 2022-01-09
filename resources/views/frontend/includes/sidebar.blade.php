<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <a class="d-lg-none" href="{{route('frontend.home')}}"><img width="75" src="/frontend/img/mobile-logo.png"></a>
            <div class="dropdown">
                <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fe fe-align-center"></i></a>
                <a href="#" class="nav-link icon"><i class="fe fe-search" data-toggle="tooltip" data-placement="right" title="" data-original-title="Ara..."></i></a>
                <a href="#" class="nav-link icon app_inbox"><i class="fe fe-inbox" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mesaj Kutum"></i></a>
                <a href="#" class="nav-link icon xs-hide"><i class="fe fe-share-2" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bağlantılarım"></i></a>
                @auth
                <a href="{{route('scotty')}}" class="nav-link icon theme_btn"><i class="fe fe-feather" data-toggle="tooltip" data-placement="right" title="" data-original-title="Scotty..."></i></a>
                @endauth
            </div>
        </div>
        <div class="hright">
            @guest
                <a href="{{route('login')}}" class="nav-link icon settingbar"><i class="fa fa-lock"></i></a>
                <a href="{{route('register')}}" class="nav-link icon settingbar"><i class="fa fa-key"></i></a>
            @else
            <a href="{{route('logout')}}" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
            @endauth
        </div>
    </div>
</div>

<div id="left-sidebar" class="sidebar">
    <a href="{{route('frontend.home')}}"> <img class="d-none d-lg-block" src="/frontend/img/logo-brand-white.png"></a>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Güncel</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-admin">Kategoriler</a></li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
            <nav class="sidebar-nav">
                <div class="d-flex justify-content-center">

                </div>

                <ul class="metismenu">

                    @foreach($data['sidebar_post'] as $item)
                    <li><a href="/{{$item->category_slug . '/' . $item->seo_slug . '/'. $item->uuid}}"><span>{{$item->post_title}}</span></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <div class="tab-pane fade" id="menu-admin" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    @foreach($data['category'] as $item)
                    <li><a href="/category/{{$item->category_slug}}"><i class="{{$item->image}}"></i><span>{{$item->category_name}}</span></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
