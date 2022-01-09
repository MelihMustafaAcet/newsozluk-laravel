<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/frontend/img/favicon.png" type="image/x-icon"/>
    <title>:: NewSözlük :: Anasayfa</title>
    @include('frontend.includes.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="/frontend/assets/js/ck-tr.js"></script>
    <style>
        .ck-editor__editable
        {
            min-height: 400px !important;
            max-height: 1500px !important;
        }
    </style>

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
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Anasayfa</a>
                        </li>
                        @auth
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#admin-Activity">Scotty!</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                        <div class="row clearfix row-deck">
                            <div class="col-6 col-md-4 col-xl-2">
                                <div class="card">
                                    <div class="card-body ribbon">
                                        {{--                                  BURAYA BAKILACAK      <div class="ribbon-box bg-azure" data-toggle="tooltip" title="Yeni Haber">5</div>--}}
                                        <a href="{{route('frontend.home')}}" class="my_sort_cut text-muted">
                                            <i class="fa fa-clock-o"></i>
                                            <span>Son Dakika</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @foreach($data['feature'] as $item)
                                <div class="col-6 col-md-4 col-xl-2">
                                    <div class="card">
                                        <div class="card-body ribbon">
                                            {{--                                       BURAYA BAK <div class="ribbon-box bg-blue" data-toggle="tooltip" title="{{$item->category_name}}">2</div>--}}
                                            <a href="/category/{{$item->category_slug}}" class="my_sort_cut text-muted">
                                                <i class="{{$item->image}}"></i>
                                                <span>{{$item->category_name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <div class="row">
                            @foreach($data['posts'] as $item)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <a href="/{{$item->category_slug . '/' . $item->seo_slug . '/'. $item->uuid}}"><img
                                                class="card-img-top" src="/images/{{$item->post_image}}" alt=""></a>
                                        <div class="card-body d-flex flex-column">
                                            <h5>
                                                <a href="/{{$item->category_slug . '/' . $item->seo_slug . '/'. $item->uuid}}">{{$item->post_title}}</a>
                                            </h5>
                                            <div class="text-muted">{{ strip_tags((Str::limit($item->post_detail,200,'...'))) }}</div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-vcenter mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="w20"><i class="fa fa-calendar text-blue"></i></td>
                                                    <td class="tx-medium">Tarih</td>
                                                    <td class="text-right">
                                                        @php
                                                            $date = \Carbon\Carbon::parse($item->post_date);
                                                            if($data['today'] == $date->format('d-m-Y') ){
                                                                  echo 'Bugün';
                                                            }else {
                                                                echo $date->format('d-m-Y');
                                                            }
                                                        @endphp
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w20"><i class="{{$item->image}} text-blue"></i></td>
                                                    <td class="tx-medium">Kategori</td>
                                                    <td class="text-right">{{$item->category_name}}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center mt-auto">
                                                <img class="avatar avatar-md mr-3"
                                                     src="/images/users/{{$item->user_image}}" alt="avatar">
                                                <div>
                                                    <a href="#">{{$item->username}}</a>
                                                    <small class="d-block text-muted">{{$item->user_nesil}}</small>
                                                </div>
                                                <div class="ml-auto text-muted">
                                                    <a href="javascript:void(0)"
                                                       class="icon d-none d-md-inline-block ml-3"><i
                                                            class="fa fa-thumbs-up mr-1"></i> 521</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="tab-pane fade" id="admin-Activity" role="tabpanel">
                        <div class="row clearfix row-deck">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Işınla beni Scotty!</h3>
                                    </div>
                                    <div class="card-body">
                                        <small>Bu alandan hızlı bir şekilde haber girişi yapabilirsiniz. Kendinizi
                                            scotty'nin ellerine bırakın...</small>
                                    </div>
                                    <form action="{{route('postInsert')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text w90">Başlık:</span>

                                                </div>

                                                <input name="title" id="title" onkeyup="checkChar()" onkeydown="checkChar()" type="text" class="form-control">


                                            </div>
{{--                                            <div id="report"></div>--}}
                                            <small class="form-text text-muted" id="report">En az 15 karakter, en çok 90 karakter olarak giriniz.</small>
                                            <div class="input-group mt-1 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text w90">Kategori:</span>
                                                </div>
                                                <select class="form-control input-height" name="category">
                                                    <option value="">Seçiniz...</option>
                                                    @foreach($data['category'] as $item)
                                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <textarea name="editordata" id="editor" placeholder="İçerik buraya gelecek">
                                            </textarea>

                                            <div class="form-group mt-2 mb-3">
                                                <input type="file" name="image" class="dropify" data-height="300"
                                                       data-max-file-size="3M"
                                                       data-allowed-file-extensions="jpg png jpeg"/>
                                                <small id="fileHelp" class="form-text text-muted">Gireceğiniz başlığa
                                                    görsel eklemeniz, başlığınızı ilgi çekici kılabilir.</small>
                                            </div>
                                            <button class="btn btn-default mt-3">Işınla!</button>
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
@include('frontend.includes.alert')
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Fotoğrafı seçebilir veya sürükleyebilirsiniz.',
            'replace': 'Fotoğrafı değiştirmek için tıklayın veya sürükleyin',
            'remove': 'Kaldır',
            'error': 'Ooops, bir şeyler ters gitti.'
        }
    });

</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'),
            {
                language: 'tr'
            }
        )
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    function checkChar() {
        var allowedChar = 90;
        var content = document.getElementById("title");
        var contLength = content.value.length;

        if (contLength > allowedChar) {
            document.getElementById("report").innerHTML = "<span style='color:red;'>UYARI: En fazla " + allowedChar + " karakter girebilirsiniz</span>";
        }else{
            document.getElementById("report").innerHTML = "En az 15 karakter, en çok 90 karakter olarak giriniz";
        }
    }
</script>
</body>
</html>
