<link href="{{ asset('css/title.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<div class="container">
    <div class ='title_top'>
        <img src="image/noimage.jpg" id = "preview">
        <div class ='title_name'>
        タイトル
        {{ $titles['name']}}
                <div class ='author_name'>著者
                </div>
            </div>
    </div>
    
    <div class ='subtitle'>
    サブタイトル
    <p>更新日:2021/07/07</p>
    </div>
    <div class = "favorite_registration">
         <button type="button" class="btn btn-primary" onclick="location.href='#'">お気に入りに登録</button>
    </div>
</div>
@endsection