<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>:: NewSözlük :: {{$detail->post_title}}</title>
    @include('frontend.includes.css')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="/frontend/assets/js/ck-tr.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 200px !important;
            max-height: 250px !important;
        }
    </style>
</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start Main top header -->

    <!-- Start Main leftbar navigation -->
@include('frontend.includes.sidebar')
<!-- Start project content area -->
    <div class="page">
        <!-- Start Page header -->
    @include('frontend.includes.topnavbar')
    <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">{{$detail->post_title}}</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Anasayfa</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('frontend.home')}}/{{$detail->category_slug}}">{{$detail->category_name}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Haber İçeriği</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="card">
                            <a href="#"><img class="card-img-top" src="/images/{{$detail->post_image}}" alt=""></a>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="#">{{$detail->post_title}}</a></h5>
                                <div class="text-muted">{!! \Str::limit($detail->post_detail,'150','(...)') !!}</div>
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
                                @guest
                                    <div class="alert alert-warning" role="alert">
                                        İçeriği yorumlayabilmek için giriş yapmış olmalısınız.
                                    </div>
                                @else
                                <form action="{{route('commentInsert')}}" method="post">
                                    @csrf
                                <textarea name="editordata" id="editor" placeholder="İçerik buraya gelecek">
                                            </textarea>
                                    <input type="hidden" name="id" value="{{Auth()->id()}}">
                                    <input type="hidden" name="belongs" value="{{request()->uuid}}">
                                    <button type="submit" class="btn btn-default mt-3">Yorumla!</button>
                                </form>
                                @endauth
                                <br>
                                <br>
                                    @foreach($data['comments'] as $item)
                                <div class="timeline_item ">
                                    <img class="avatar"
                                         src="/images/users/{{$item->user_image}}"
                                         alt=""/>
                                    <span><a href="javascript:void(0);">  {{$item->username}}</a>&nbsp; {{$item->city ?? 'Belirtilmemiş'}} <small
                                            class="float-right text-right">
                                          {{$item->created_at}}
                                        </small></span>
                                    <div class="msg">
                                        {!!$item->comment_detail!!}
                                        <a href="javascript:void(0);" class="mr-20 text-muted"><i
                                                class="fa fa-thumbs-up text-green"></i> Beğeni sayısı</a>

                                    </div>
                                </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center">
                                        {!! $data['comments']->links() !!}
                                    </div>


                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Start main footer -->
        @include('frontend.includes.footer')
    </div>
</div>


</body>

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
@include('frontend.includes.scripts')
@include('frontend.includes.alert')
</html>
