<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>:: NewSözlük :: Anasayfa</title>
    @include('frontend.includes.css')

</head>

<body class="font-muli theme-cyan gradient">
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">

    @include('frontend.includes.sidebar')
    <div class="page">
        @include('frontend.includes.topnavbar')
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Hoş geldin, {{Auth::user()->username}}!</h1>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-demo-tab" data-toggle="pill" href="#pills-demo" role="tab" aria-controls="pills-calendar" aria-selected="false">Demo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="widgets1">
                                    <div class="icon">
                                        <i class="icon-envelope text-success font-30"></i>
                                    </div>
                                    <div class="details">
                                        <h6 class="mb-0 font600">E-Posta Onay</h6>
                                        <span class="mb-0">Onaylı</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="widgets1">
                                    <div class="icon">
                                        <i class="icon-folder-alt text-warning font-30"></i>
                                    </div>
                                    <div class="details">
                                        <h6 class="mb-0 font600">Toplam Gönderi</h6>
                                        <span class="mb-0">6,270</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="widgets1">
                                    <div class="icon">
                                        <i class="icon-like text-danger font-30"></i>
                                    </div>
                                    <div class="details">
                                        <h6 class="mb-0 font600">Toplam Nays</h6>
                                        <span class="mb-0">720 Nays</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="widgets1">
                                    <div class="icon">
                                        <i class="icon-user text-primary font-30"></i>
                                    </div>
                                    <div class="details">
                                        <h6 class="mb-0 font600">Arkadaş</h6>
                                        <span class="mb-0">614</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tabContent">


                            <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Profilimi Düzenle</h3>
                                    </div>
                                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card-body form-horizontal">
                                        <div class="form-group row">
                                            <div class="form-control-file text-center">


                                                <img
                                                    class="card-profile-img" width="250" src="/images/users/{{$user->user_image}}"
                                                />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Kullanıcı Adı <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input name="username" type="text" class="form-control" value="{{$user->username}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Eposta <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input name="email" type="text" class="form-control" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Adınız - soyadınız<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input name="name" type="text" class="form-control" value="{{$user->name}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Şehir <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select name="sehir" class="form-control custom-select" required>
                                                    <option value="null" disabled selected>İl Seçiniz</option>
                                                    <option value="İstanbul" {{($user->city == "İstanbul") ? 'selected' : ''}}>İstanbul</option>
                                                    <option value="Ankara" {{($user->city == "Ankara") ? 'selected' : ''}}>Ankara</option>
                                                    <option value="İzmir" {{($user->city == "İzmir") ? 'selected' : ''}}>İzmir</option>
                                                    <option value="Adana" {{($user->city == "Adana") ? 'selected' : ''}}>Adana</option>
                                                    <option value="Adıyaman" {{($user->city == "Adıyaman") ? 'selected' : ''}}>Adıyaman</option>
                                                    <option value="Afyonkarahisar" {{($user->city == "Afyonkarahisar") ? 'selected' : ''}}>Afyonkarahisar</option>
                                                    <option value="Ağrı" {{($user->city == "Ağrı") ? 'selected' : ''}}>Ağrı</option>
                                                    <option value="Aksaray" {{($user->city == "Aksaray") ? 'selected' : ''}}>Aksaray</option>
                                                    <option value="Amasya" {{($user->city == "Amasya") ? 'selected' : ''}}>Amasya</option>
                                                    <option value="Antalya" {{($user->city == "Antalya") ? 'selected' : ''}}>Antalya</option>
                                                    <option value="Ardahan" {{($user->city == "Ardahan") ? 'selected' : ''}}>Ardahan</option>
                                                    <option value="Artvin" {{($user->city == "Artvin") ? 'selected' : ''}}>Artvin</option>
                                                    <option value="Aydın" {{($user->city == "Aydın") ? 'selected' : ''}}>Aydın</option>
                                                    <option value="Balıkesir" {{($user->city == "Balıkesir") ? 'selected' : ''}}>Balıkesir</option>
                                                    <option value="Bartın" {{($user->city == "Bartın") ? 'selected' : ''}}>Bartın</option>
                                                    <option value="Batman" {{($user->city == "Batman") ? 'selected' : ''}}>Batman</option>
                                                    <option value="Bayburt" {{($user->city == "Bayburt") ? 'selected' : ''}}>Bayburt</option>
                                                    <option value="Bilecik" {{($user->city == "Bilecik") ? 'selected' : ''}}>Bilecik</option>
                                                    <option value="Bingöl" {{($user->city == "Bingöl") ? 'selected' : ''}}>Bingöl</option>
                                                    <option value="Bitlis" {{($user->city == "Bitlis") ? 'selected' : ''}}>Bitlis</option>
                                                    <option value="Bolu" {{($user->city == "Bolu") ? 'selected' : ''}}>Bolu</option>
                                                    <option value="Burdur" {{($user->city == "Burdur") ? 'selected' : ''}}>Burdur</option>
                                                    <option value="Bursa" {{($user->city == "Bursa") ? 'selected' : ''}}>Bursa</option>
                                                    <option value="Çanakkale" {{($user->city == "Çanakkale") ? 'selected' : ''}}>Çanakkale</option>
                                                    <option value="Çankırı" {{($user->city == "Çankırı") ? 'selected' : ''}}>Çankırı</option>
                                                    <option value="Çorum" {{($user->city == "Çorum") ? 'selected' : ''}}>Çorum</option>
                                                    <option value="Denizli" {{($user->city == "Denizli") ? 'selected' : ''}}>Denizli</option>
                                                    <option value="Diyarbakır" {{($user->city == "Diyarbakır") ? 'selected' : ''}}>Diyarbakır</option>
                                                    <option value="Düzce" {{($user->city == "Düzce") ? 'selected' : ''}}>Düzce</option>
                                                    <option value="Edirne" {{($user->city == "Edirne") ? 'selected' : ''}}>Edirne</option>
                                                    <option value="Elazığ" {{($user->city == "Elazığ") ? 'selected' : ''}}>Elazığ</option>
                                                    <option value="Erzincan" {{($user->city == "Erzincan") ? 'selected' : ''}}>Erzincan</option>
                                                    <option value="Erzurum" {{($user->city == "Erzurum") ? 'selected' : ''}}>Erzurum</option>
                                                    <option value="Eskişehir" {{($user->city == "Eskişehir") ? 'selected' : ''}}>Eskişehir</option>
                                                    <option value="Gaziantep" {{($user->city == "Gaziantep") ? 'selected' : ''}}>Gaziantep</option>
                                                    <option value="Giresun" {{($user->city == "Giresun") ? 'selected' : ''}}>Giresun</option>
                                                    <option value="Gümüşhane" {{($user->city == "Gümüşhane") ? 'selected' : ''}}>Gümüşhane</option>
                                                    <option value="Hakkâri" {{($user->city == "Hakkâri") ? 'selected' : ''}}>Hakkâri</option>
                                                    <option value="Hatay" {{($user->city == "Hatay") ? 'selected' : ''}}>Hatay</option>
                                                    <option value="Iğdır" {{($user->city == "Iğdır") ? 'selected' : ''}}>Iğdır</option>
                                                    <option value="Isparta" {{($user->city == "Isparta") ? 'selected' : ''}}>Isparta</option>
                                                    <option value="Kahramanmaraş" {{($user->city == "Kahramanmaraş") ? 'selected' : ''}}>Kahramanmaraş</option>
                                                    <option value="Karabük" {{($user->city == "Karabük") ? 'selected' : ''}}>Karabük</option>
                                                    <option value="Karaman" {{($user->city == "Karaman") ? 'selected' : ''}}>Karaman</option>
                                                    <option value="Kars" {{($user->city == "Kars") ? 'selected' : ''}}>Kars</option>
                                                    <option value="Kastamonu" {{($user->city == "Kastamonu") ? 'selected' : ''}}>Kastamonu</option>
                                                    <option value="Kayseri" {{($user->city == "Kayseri") ? 'selected' : ''}}>Kayseri</option>
                                                    <option value="Kırıkkale" {{($user->city == "Kırıkkale") ? 'selected' : ''}}>Kırıkkale</option>
                                                    <option value="Kırklareli" {{($user->city == "Kırklareli") ? 'selected' : ''}}>Kırklareli</option>
                                                    <option value="Kırşehir" {{($user->city == "Kırşehir") ? 'selected' : ''}}>Kırşehir</option>
                                                    <option value="Kilis" {{($user->city == "Kilis") ? 'selected' : ''}}>Kilis</option>
                                                    <option value="Kocaeli" {{($user->city == "Kocaeli") ? 'selected' : ''}}>Kocaeli</option>
                                                    <option value="Konya" {{($user->city == "Konya") ? 'selected' : ''}}>Konya</option>
                                                    <option value="Kütahya" {{($user->city == "Kütahya") ? 'selected' : ''}}>Kütahya</option>
                                                    <option value="Malatya" {{($user->city == "Malatya") ? 'selected' : ''}}>Malatya</option>
                                                    <option value="Manisa" {{($user->city == "Manisa") ? 'selected' : ''}}>Manisa</option>
                                                    <option value="Mardin" {{($user->city == "Mardin") ? 'selected' : ''}}>Mardin</option>
                                                    <option value="Mersin" {{($user->city == "Mersin") ? 'selected' : ''}}>Mersin</option>
                                                    <option value="Muğla" {{($user->city == "Muğla") ? 'selected' : ''}}>Muğla</option>
                                                    <option value="Muş" {{($user->city == "Muş") ? 'selected' : ''}}>Muş</option>
                                                    <option value="Nevşehir" {{($user->city == "Nevşehir") ? 'selected' : ''}}>Nevşehir</option>
                                                    <option value="Niğde" {{($user->city == "Niğde") ? 'selected' : ''}}>Niğde</option>
                                                    <option value="Ordu" {{($user->city == "Ordu") ? 'selected' : ''}}>Ordu</option>
                                                    <option value="Osmaniye" {{($user->city == "Osmaniye") ? 'selected' : ''}}>Osmaniye</option>
                                                    <option value="Rize" {{($user->city == "Rize") ? 'selected' : ''}}>Rize</option>
                                                    <option value="Sakarya" {{($user->city == "Sakarya") ? 'selected' : ''}}>Sakarya</option>
                                                    <option value="Samsun" {{($user->city == "Samsun") ? 'selected' : ''}}>Samsun</option>
                                                    <option value="Siirt" {{($user->city == "Siirt") ? 'selected' : ''}}>Siirt</option>
                                                    <option value="Sinop" {{($user->city == "Sinop") ? 'selected' : ''}}>Sinop</option>
                                                    <option value="Sivas" {{($user->city == "Sivas") ? 'selected' : ''}}>Sivas</option>
                                                    <option value="Şırnak" {{($user->city == "Şırnak") ? 'selected' : ''}}>Şırnak</option>
                                                    <option value="Tekirdağ" {{($user->city == "Tekirdağ") ? 'selected' : ''}}>Tekirdağ</option>
                                                    <option value="Tokat" {{($user->city == "Tokat") ? 'selected' : ''}}>Tokat</option>
                                                    <option value="Trabzon" {{($user->city == "Trabzon") ? 'selected' : ''}}>Trabzon</option>
                                                    <option value="Tunceli" {{($user->city == "Tunceli") ? 'selected' : ''}}>Tunceli</option>
                                                    <option value="Şanlıurfa" {{($user->city == "Şanlıurfa") ? 'selected' : ''}}>Şanlıurfa</option>
                                                    <option value="Uşak" {{($user->city == "Uşak") ? 'selected' : ''}}>Uşak</option>
                                                    <option value="Van" {{($user->city == "Van") ? 'selected' : ''}}>Van</option>
                                                    <option value="Yalova" {{($user->city == "Yalova") ? 'selected' : ''}}>Yalova</option>
                                                    <option value="Yozgat" {{($user->city == "Yozgat") ? 'selected' : ''}}>Yozgat</option>
                                                    <option value="Zonguldak" {{($user->city == "Zonguldak") ? 'selected' : ''}}>Zonguldak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Hakkımda</label>
                                            <div class="col-md-7">
                                                <textarea rows="5" name="editor" class="form-control" placeholder="Kimsin sen?">{{$user->bio ?? null}}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Avatar</label>
                                            <div class="col-md-7">
                                                <input name="avatar" type="file" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{Auth()->id()}}" name="id">
                                        <input type="hidden" value="{{$user->user_image}}" name="oldImage">
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Profili güncelle</button>
                                    </div>
                                    </form>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.includes.footer')
    </div>
</div>

@include('frontend.includes.scripts')

</body>
</html>
