<div class="section-body" id="page_top">
    <div class="container-fluid">
        <div class="page-header">
            <div class="left">
            </div>

            <div class="right">
                @guest
                    <ul class="nav nav-pills d-none d-lg-block">
                        <li class="nav-item">
                            <a class="text-body" href="{{route('login')}}" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-lock"></i> Giriş Yap</a>

                        </li>

                    </ul>
                    <li class="nav-item d-none d-lg-block">
                        <a class="text-body" href="{{route('register')}}" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-key"></i> Kayıt ol</a>
                    </li>
                    </ul>
                @else
                    <div class="notification d-flex">

                        <div class="dropdown d-flex">
                            <a href="javascript:void(0)" class="chip ml-3" data-toggle="dropdown">
                                <span class="avatar"
                                      style="background-image: url(/images/users/{{Auth::user()->user_image}})"></span>
                                {{Auth::user()->username}}</a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{route('profile')}}"><i
                                        class="dropdown-icon fe fe-user"></i> Profilim</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="dropdown-icon fe fe-send"></i> Mesaj Kutusu</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="dropdown-icon fe fe-help-circle"></i> Yardım?</a>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="dropdown-icon fe fe-log-out"></i>
                                    Çık dışarı, çık!</a>
                            </div>
                        </div>
                    </div>
            </div>
            @endauth

        </div>
    </div>
</div>
