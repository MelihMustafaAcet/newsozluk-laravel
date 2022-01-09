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
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Anasayfa</h1>

                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Anasayfa</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#admin-Activity">Scotty!</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @include('frontend.includes.footer')
    </div>
</div>

@include('frontend.includes.scripts')

</body>
</html>
