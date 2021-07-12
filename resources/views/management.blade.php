@extends('layouts.app')
@section('content')

<h1>上架商品管理</h1>
@if($book_info->isEmpty())
<h1>暫無資料</h1>
<a href="{{route('home')}}">返回首頁</a>
<a href="{{route('add.Book')}}">
    <div id="add-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="186" height="170.8" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </div>
</a>
@elseif($book_info)
<div id="list_page">
    @foreach($book_info as $data)
    <div class="card" id="platform-card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">書名 : {{$data->name}}</h5>
            <h5 class="card-title">ISBN : {{$data->ISBN}}</h5>
            <h5 class="card-title">書況 : {{$data->bookStatus}}</h5>
            <h5 class="card-title">語言 : {{$data->language}}</h5>
            <h5 class="card-title">出版日期 : {{$data->publishDate}}</h5>
            <h5 class="card-title">作者 : {{$data->author}}</h5>
            <h5 class="card-title">價格 : {{$data->price}}</h5>
            <a href="#" class="btn btn-primary">修改</a>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection