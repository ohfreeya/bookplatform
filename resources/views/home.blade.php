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
<h1>查無此資料</h1>
<a href="{{route('home')}}">返回首頁</a>
@elseif($book_info)
<div class="list_page">
    @foreach($book_info as $data)
    <div class="card" id="platform-card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$data->name}}</h5>
            <p class="card-text">Some</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach
</div>
<a href="{{route('add.Book')}}">新增書籍</a>
<hr>
<a href="{{route('home')}}">返回首頁</a>
@endif
@endsection