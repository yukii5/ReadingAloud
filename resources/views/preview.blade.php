<link href="{{ asset('css/preview.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="preview_header">
            <img src = "{{'/storage/'. $preview['image'] }}"  id ="preview">
            <!-- <img src="{{ asset('image/noimage.jpg')}}" id = "preview"> -->
            <div class = "preview_name">
                <div class = "genre">
                    <div class = "title">
                        <a href = "/title/{{$previews['id']}}">{{$previews['name']}}</a>
                        <p>著者： <a href = '#'>{{$preview['author']}}</a></p>
                    </div>
                </div>
                <div class = "around">
                    <p>
                    <a href = "/title/{{$previews['id']}}">目次</a>
                    </p>
                    {{ $previous->links('vendor.pagination.original_pagination_view') }}
                </div>
                <div class = "genre">
                    <h1>{{$preview['subtitle']}}</h1>
                </div>
            </div>
        </div>
        <div class = "contents">
        {{$preview['content']}}
        </div>
        <div class = "around_bottom">
            <div class = "around">
                <p>
                <a href = "/title/{{$previews['id']}}">目次</a>
                </p>
                {{ $previous->links('vendor.pagination.original_pagination_view') }}
            </div>
        </div>



    
    
    </div>
@endsection