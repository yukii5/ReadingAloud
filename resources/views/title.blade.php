<link href="{{ asset('css/title.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<div class="container">
    <div class ='title_top'>
    <img src = "{{'/storage/'. $title['image'] }}"  id ="preview">
        <div class ='title_name'>
        {{ $titles['name']}}
            <div class ='author_name'>
                著者：{{ $title['author']}}
            </div>
        </div>
    </div>
    
    <div class ='subtitle'>
        @foreach($subtitles AS $subtitle)
            <div class = "subtitles">
                <a href = "/preview/{{ $subtitle['id']}}/" >
                    {{ $subtitle['id']}}
                    {{ $subtitle['subtitle']}}
                </a>
                <p>
                    {{ $subtitle['updated_at']}}
                </p>
            </div>
        @endforeach
    </div>
        
    <div class = "favorite_registration">
         <button type="button" class="btn btn-primary" onclick="location.href='#'">お気に入りに登録</button>
    </div>
</div>
@endsection