@extends('layouts.app')
@section('content')

<h1>上架商品管理</h1>
@if($book_info)
<div id="list_page">
    @foreach($book_info as $data)
    <div class="card" id="platform-card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">書名 : {{$data->name}}</h5>
            <h5 class="card-title">ISBN : {{$data->ISBN}}</h5>
            <h5 class="card-title">作者 : {{$data->author}}</h5>
            <h5 class="card-title">價格 : {{$data->price}}</h5>
            <a href="#" class="btn btn-primary">修改</a>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection