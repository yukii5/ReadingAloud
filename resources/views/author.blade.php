<link href="{{ asset('css/author.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
<div class="container">
    <div class = "user_name">
        {{ $user['name'] }}
        <p>さんの投稿作品</p>
    </div>
    <div class = 'genre' >
    作品一覧
    <p>全{{ $count_user_books }}作品</p>
    </div>
    <div class = "performance_list">
        @foreach($titles AS $title)
        <a href="#"> {{ $title['title'] }}</a>
        <p>{{ $title['created_at'] }}</p>
        @endforeach
    </div>
    <div class = 'genre' >
    {{ $user['name'] }}さんの情報
    </div>
    <div class = "performance_list">
        <table >
            <tbody>
                <tr>
                    <th class="width20"></th>
                    <th class="width80"></th>
                </tr>
                <tr>
                    <td>ユーザーネーム</td>
                    <td>{{ $user['name'] }}</td>
                </tr>
                <tr>
                    <td>サイト</td>
                    <td>※外部リンクに遷移します</td>
                </tr>
                <tr>
                    <td>自己紹介</td>
                    <td>自己紹介</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class = "favorite_registration">
         <button type="button" class="btn btn-primary" onclick="location.href='#'">お気に入りに登録</button>
    </div>
</div>
@endsection