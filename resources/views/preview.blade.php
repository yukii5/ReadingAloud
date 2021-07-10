<link href="{{ asset('css/preview.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="preview_header">
            <img src="{{ asset('image/noimage.jpg')}}" id = "preview">
            <div class = "preview_name">
                <div class = "genre">
                    <div class = "title">
                        <a href = '#'>タイトル</a>
                        <p>著者： <a href = '#'>XXXX</a></p>
                    </div>
                </div>
                <div class = "around">
                    <a href = "#"><<前へ</a>
                    <a href = "#">次へ>></a>
                    <a href = "#">目次</a>
                </div>
                <div class = "count">
                    8/100
                </div>
                <div class = "genre">
                    <h1>サブタイトル</h1>
                </div>
            </div>
        </div>
        <div class = "contents">
            あsdfgひゅじぇsrdftyぐhじk
        </div>
        
        <div class = "around">
            <a href = "#"><<前へ</a>
            <a href = "#">次へ>></a>
            <a href = "#">目次</a>
        </div>


    
    
    </div>
@endsection