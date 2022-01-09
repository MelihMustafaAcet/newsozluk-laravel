<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <title>:: NewSozluk :: Kayıt</title>

    <link rel="stylesheet" href="frontend/assets/plugins/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="frontend/assets/css/style.min.css"/>
    <link rel="stylesheet" href="frontend/assets/css/default.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body class="font-muli theme-cyan gradient">

<div class="auth option2" style="background-image: url('frontend/img/back.png'); background-size: cover;">
    <div class="auth_left">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a class="header-brand"><img src="frontend/img/form.png"></a>
                    <div class="card-title">Yeni hesap oluşturun</div>
                    <button type="button" class="btn btn-google"><i class="fa fa-google mr-2"></i>Google</button>
                    <h6 class="mt-3 mb-3">Veya</h6>
                </div>
                <form action="{{route('registerInsert')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input name="username" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Mail Adresi</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Şifre</label>
                    <input name="password" type="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Tekrar Şifre</label>
                    <input name="repassword" type="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input name="tos" type="checkbox" class="custom-control-input" required/>
                        <span class="custom-control-label"><a href="#">Kullanıcı sözleşmesi</a>'ni kabul ediyorum.</span>
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Oluştur</button>
                    <div class="text-muted mt-4">Zaten hesabınız var mı? <a href="{{route('login')}}">Giriş Yapın</a></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="frontend/assets/bundles/lib.vendor.bundle.js"></script>

<script src="frontend/assets/js/core.js"></script>

@include('frontend.includes.alert')
</body>
</html>
