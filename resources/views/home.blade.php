@extends('layouts.app')

@section('content')

<div class="search">
    <nav class="navbar navbar-light " id="search-bar">
        <form class="form-inline" action="{{route('search.Book')}}" method="POST">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="請輸入書名或作者名" aria-label="Search" id="search-field" name="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
</div>
<hr>
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
            <h5 class="card-title">{{$data->name}}</h5>
            <h5 class="card-title">ISBN : {{$data->ISBN}}</h5>
            <h5 class="card-title">作者 :</h5>
            <h5 class="card-title">價格 : {{$data->price}}</h5>
            <a href="#" class="btn btn-primary">購買</a>
        </div>
    </div>
    @endforeach
</div>
<a href="{{route('add.Book')}}">
    <div id="add-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="186" height="170.8" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </div>
</a>
@endif
@endsection