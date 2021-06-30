<link href="{{ asset('css/picup_slider.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<form id = "main-text" method = 'POST' action = "/store" enctype = "multipart/form-data">
    @csrf
    <div class="container">
        <input type = 'hidden' name ='user_id' value = "{{ $user['id'] }}" >
        <div class = "body-center">
            <div class = "img-select">
                <div class = "genre">
                    イメージ画像
                </div>
                <input type="file" name = 'image' class = "bg-white" id="myImage" accept="image/*"  onchange="setImage(this);" onclick="this.value = '';" >
            
                <img src="image/noimage.jpg" id = "preview">
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
                        タイトル
                    </div>
                    <input type="text" name = 'title' class="title-text" size="50%" placeholder="タイトルを入力してください">
                </div>
                <div class = "title-select">
                    <div class = "genre">
                        サブタイトル
                    </div>
                    <input type="text" name = 'subtitle' class="title-text" size="50%" placeholder="サブタイトルを入力してください">
                    <div class = "title-select">
                        <div class = "genre">
                            著者
                        </div>
                        <input type="text" name = 'author' class="title-text" size="50%" placeholder="著者を入力してください">
                    </div>
                </div>
                <div class = "title-select">
                    <div class = "genre">
                        カテゴリー
                    </div>
                    <input type="text" name = 'category' class="title-text" size="50%" placeholder="カテゴリーを入力してください">
                </div>
            </div>
        </div>
        <div class = "genre">
            テキスト
        </div>
        <textarea class = "text-area" name = 'content' placeholder="読み上げる文章を入力してください">
        </textarea>
    </div>
</form>
<div class="reading">
    <div class="reading-btn">
        <button type="button" class="btn btn-primary"
        onclick="location.href='#'">読み上げ
        </button>
        <button type="button" class="btn btn-info"
        onclick="location.href='#'">プレビュー
        </button>
        <button type="submit" form="main-text" class="btn btn-outline-primary" >保存
        </button>
    </div>
    <div class="reading-setting">
        <div class="form-group">
            <button type="submit" class="btn search_btn">言語</button><input type="text" class="search_key" placeholder="日本語">
        </div>
        <div class="form-group">
            <button type="submit" class="btn search_btn">音声</button><input type="text" class="search_key" placeholder="女性">
        </div>
        <div class="form-group">
            <button type="submit" class="btn search_btn">速度</button><input type="range" class="search_key" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn search_btn">高低</button><input type="range" class="search_key" >
        </div>
    </div>
</div>
@endsection