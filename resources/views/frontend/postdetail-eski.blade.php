<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/frontend/img/favicon.png" type="image/x-icon"/>
    <title>:: NewSözlük :: {{$detail->post_title}}</title>
    @include('frontend.includes.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="/frontend/assets/js/ck-tr.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 200px !important;
            max-height: 200px !important;
        }
    </style>

</head>


<body class="font-muli theme-cyan gradient">


<div id="main_content">
    @include('frontend.includes.sidebar')
    <div class="page">
        @include('frontend.includes.topnavbar')
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="/images/{{$detail->post_image}}" alt="">
                                <div class="card-body d-flex flex-column">
                                    <h5><a href="news-detail.html">{{$detail->post_title}}</a></h5>
                                    <div
                                        class="text-muted">{!! \Str::limit($detail->post_detail,'150','(...)') !!}</div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-vcenter mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="w20"><i class="fa fa-calendar text-blue"></i></td>
                                            <td class="tx-medium">Tarih</td>
                                            <td class="text-right">
                                                @php
                                                    $date = \Carbon\Carbon::parse($detail->post_date);

                                                    if($data['today'] == $date->format('d-m-Y') ){
                                                          echo 'Bugün';
                                                    }else {
                                                        echo $date->format('d-m-Y');
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w20"><i class="fa fa-newspaper-o text-blue"></i></td>
                                            <td class="tx-medium">Kategori</td>
                                            <td class="text-right">{{$detail->category_name}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center mt-auto">
                                        <img class="avatar avatar-md mr-3" src="/images/users/{{$detail->user_image}}"
                                             alt="avatar">
                                        <div>
                                            <a href="#">{{$detail->username}}</a>
                                            <small class="d-block text-muted">{{$detail->user_nesil}}</small>
                                        </div>
                                        <div class="ml-auto text-muted">
                                            <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                                    class="fa fa-thumbs-up mr-1"></i> 521</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        {!! html_entity_decode($detail->post_detail) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hemen Yorumla!</h3>
                                </div>
                                <div class="card-body">
        <textarea name="editordata" id="editor" placeholder="İçerik buraya gelecek">
                                            </textarea>

                                    <button class="btn btn-default mt-3">Yorumla!</button>

                                    <br>
                                    <br>
                                    <div class="timeline_item ">
                                        <img class="avatar"
                                             src="https://images.ruyandagor.com/2017/04/siyah-takim-elbiseli-erkek-gormek-1823.jpg"
                                             alt=""/>
                                        <span><a href="javascript:void(0);">Ebubekir Kahriman</a>&nbsp; Ankara <small
                                                class="float-right text-right">Bugün</small></span>
                                        <div class="msg">
                                            <p>Bu adamın bu hallere düşmesi beni çok üzüyor.</p>
                                            <a href="javascript:void(0);" class="mr-20 text-muted"><i
                                                    class="fa fa-thumbs-up text-green"></i> 12 Nays</a>

                                        </div>
                                    </div>
                                    <div class="timeline_item ">
                                        <img class="avatar" src="https://cdn.karar.com/news/28435.jpg" alt=""/>
                                        <span><a href="javascript:void(0);">UfkuGeniş</a>&nbsp; Adana <small
                                                class="float-right text-right">Bugün</small></span>
                                        <div class="msg">
                                            <p>Benim borcumu silmezler ama.</p>
                                            <a href="javascript:void(0);" class="mr-20 text-muted"><i
                                                    class="fa fa-thumbs-up text-green"></i> 1 Nays</a>
                                        </div>
                                    </div>


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
