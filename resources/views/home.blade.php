<link href="{{ asset('css/pickup_slider.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<div class = 'genre' >
    ピックアップ作品
</div>
<div id="stage">
	<input id="r1" type="radio" name="slider8">
	<input id="r2" type="radio" name="slider8">
	<input id="r3" type="radio" name="slider8">
	<input id="r4" type="radio" name="slider8">
	<input id="r5" type="radio" name="slider8">
	<input id="r6" type="radio" name="slider8">
	<input id="r7" type="radio" name="slider8">
	<input id="r8" type="radio" name="slider8">
  <!-- スライド群 -->
  <div id="photos">
        @foreach($pickup_books AS $pickup_book)
          <img src = "{{'/storage/'. $pickup_book['image'] }}" width = "250px" height ="250px" hspace="20px" vspace="20px">
        @endforeach
  	
  </div>
  <!-- スライダー部の高さ確保 -->
  <div style="padding-top: 22%;"></div>
  <!-- スライドボタン -->
  <div id="btns">
  	<label for="r1" id="btn1" class="p_bar"></label>
  	<label for="r2" id="btn2" class="p_bar"></label>
  	<label for="r3" id="btn3" class="p_bar"></label>
  	<label for="r4" id="btn4" class="p_bar"></label>
  	<label for="r5" id="btn5" class="p_bar"></label>
  	<label for="r6" id="btn6" class="p_bar"></label>
  	<label for="r7" id="btn7" class="p_bar"></label>
  	<label for="r8" id="btn8" class="p_bar"></label>
    <!-- 位置表示バー -->
    <div id="p_btn"></div>
  </div>
  <!-- ボタン部の高さ確保 -->
  <div style="padding-top:2%;"></div>
</div>
<div class="container">
    <div class="body-center">
        <div class="category">
            <div class = 'genre' >
                カテゴリーから探す
            </div>
            <ul class = "category-list">
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
                <li><a href="#">lisi1</a></li>
                <li><a href="#">lisi2</a></li>
                <li><a href="#">lisi3</a></li>
                <li><a href="#">lisi4</a></li>
            </ul>
        </div>
        
        <div class="new-contents">
            <div class = 'genre' >
                更新された作品
            </div>
            <div class = "new-list">
                @foreach($new_books AS $new_book)
                    <div calss = "title">
                    <a href="#">
                    {{ $new_book['title'] }}
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class = "body-center">
        <div class = "img-select">
            <a href="#"><img src="image/チータくん200右.jpg"></a>
        </div>
        <div class = "title-select">
            <div class = "genre">
                選択中のタイトル
            </div>
            <div class = "title-select-name">
            <a href="#"> {{ $new_book['title'] }}</a>
            </div>
        </div>
    </div>
    <div class="reading">
        <div class="reading-btn">
            <button type="button" class="btn btn-primary"
            onclick="location.href='#'">読み上げ
            </button>
            <button type="button" class="btn btn-outline-primary"
            onclick="location.href='/create'">テキスト入力へ
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

</div>
    
@endsection