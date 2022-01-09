<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>:: NewSözlük :: Scotty</title>
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

        @include('frontend.includes.footer')
    </div>
</div>

@include('frontend.includes.scripts')

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
