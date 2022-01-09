<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <script src="https://kit.fontawesome.com/a135a59971.js" crossorigin="anonymous"></script>
    <title>Kullanıcı Giriş Ekranı</title>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="frontend/assets/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Core css -->
    <link rel="stylesheet" href="frontend/assets/css/style.min.css"/>

</head>
<body class="font-muli theme-cyan gradient">
<div class="auth option2" style="background-image: url('frontend/img/back.png'); background-size: cover;">
    <div class="auth_left">
        <div class="card">
            <div class="card-body ">
                <div class="text-center">
                    <a class="header-brand" href="{{route('frontend.home')}}"><img src="frontend/img/form.png"></a>
                    <div class="card-title mt-3">Hesabınıza giriş yapın</div>
                    <button type="button" class="btn btn-facebook"><i class="fa fa-facebook mr-2"></i>Facebook</button>
                    <button type="button" class="btn btn-google"><i class="fa fa-google mr-2"></i>Google</button>
                    <h6 class="mt-3 mb-3">Veya</h6>
                </div>
                <form action="{{route('loginattempt')}}">
                    @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mail">
                </div>
                <div class="form-group">
                    <label class="form-label"><a href="forgot-password.html" class="float-right small">Şifremi Unuttum</a></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Şifre">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input name="remember" type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Beni Hatırla</span>
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block" title="">Giriş Yap</button>
                    <div class="text-muted mt-4">Hesabınız yok mu? <a href="{{route('register')}}">Üye Ol</a></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="frontend/assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="frontend/assets/js/core.js"></script>
@include('frontend.includes.alert')
</body>
</html>
