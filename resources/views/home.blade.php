@extends('layouts.app')

@section('content')

<div class="search">
    <nav class="navbar navbar-light " id="search-bar">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search-field">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
</div>
<hr>
<div class="list">
    @foreach($book_info as $data)
    <div class="card" id="platform-card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$data->name}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach
</div>
<a href="{{route('add.Book')}}">新增書籍</a>
@endsection