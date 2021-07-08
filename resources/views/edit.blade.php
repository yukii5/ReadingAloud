<link href="{{ asset('css/pickup_slider.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<form id = "main-text" method = 'POST' action = "{{ route('update',  ['id' => $book['id'] ] )}}" enctype = "multipart/form-data">
    @csrf
    <div class="container">
        <div class = "genre">
            <h1>作品編集</h1>
        </div>
        <input type = 'hidden' name ='user_id' value = "{{ $user['id'] }}" >
        <div class = "body-center">
            <div class = "img-select">
                <div class = "genre">
                    イメージ画像
                </div>
                <input type="file" name = 'image' class = "bg-white" id="myImage" accept="image/*"  onchange="setImage(this);" onclick="this.value = '';" >

                <img src="{{ asset('image/noimage.jpg')}}" id = "preview">
                <img id="preview" >

                <script>
                    function setImage(target) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById("preview").setAttribute('src', e.target.result);
                        }
                        reader.readAsDataURL(target.files[0]);
                        
                    };
                </script>
            </div>
            <div class = "container-ceate">
                <div class = "title-select">
                    <div class = "genre">
                    </div>
                    <input type="text" name = 'title' class="title-text" size="50%" value={{ $book['title']}}>
                </div>
                <div class = "title-select">
                    <div class = "genre">
                        サブタイトル
                    </div>
                    <input type="text" name = 'subtitle' class="title-text" size="50%" value={{ $book['subtitle']}}>
                    <div class = "title-select">
                        <div class = "genre">
                            著者
                        </div>
                        <input type="text" name = 'author' class="title-text" size="50%" value={{ $book['author']}}>
                    </div>
                </div>
                <div class = "title-select">
                    <div class = "genre">
                        カテゴリー
                    </div>
                    <div class="form-group">
                        {{-- dd($categories) --}}
                        <select class='form-text' name='category_id'>
                        <!-- <select name = 'category_id' class="title-text" > -->
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" {{ $category['id'] == $book['category_id'] ? "selected" : "" }}>{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <input type="text" name = 'category' class="title-text" size="50%" value='カテゴリーID'> -->
                </div>
            </div>
        </div>
        <div class = "genre">
            テキスト
        </div>
        <textarea class = "text-area" name = 'content'>{{ $book['content']}}
        </textarea>
    </div>
</form>
<div class="reading-edit">
        <button type="submit" form="main-text" class="btn btn-primary" >更新
        </button>
        <form method = 'POST' action = "/delete/{{$book['id']}}" id = 'delete-form'>
            @csrf
            <button type="submit" class="btn btn-danger"
            >削除
            </button>
        </form>
</div>
@endsection