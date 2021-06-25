@extends('layouts.app')
@section('content')
<div class="container">
    <h2>上架書籍</h2>
    @if ($hint === '1')
    <div class="alert alert-success">
        <strong>已完成修改</strong>
        <a href="{{route('platform')}}" class="alert-link">點擊此處回到首頁</a>
    </div>
    @elseif ($hint === "2")
    <div class="alert alert-danger">
        <strong>密碼輸入錯誤! </strong>資料未被修改
    </div>
    @endif
    <hr>
    <form action="{{route('add.Book.data')}}" class="was-validated" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="uname">出售者:(不可修改) <label>
                    <input type="text" class="form-control" id="seller" name="seller" value="{{Auth::user()->name}}" readonly>
        </div>
        <div class="form-group">
            <label for="uname">E-Mail:(不可修改) <label>
                    <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly>
        </div>
        <div class="form-group">
            <label for="name">書名: <b class="text-danger">(請輸入書名)</b></label>
            <input type="text" class="form-control" id="name" placeholder="請輸入書名" name="name" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="ISBN">ISBN: <b class="text-danger">(請輸入ISBN)</b></label>
            <input type="text" class="form-control" id="ISBN" placeholder="請輸入ISBN" name="ISBN" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="author">作者: <b class="text-danger">(請輸入作者)</b></label>
            <input type="text" class="form-control" id="author" placeholder="請輸入作者" name="author" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="price">期望金額: <b class="text-danger">(請輸入金額)</b></label>
            <input type="text" class="form-control" id="price" placeholder="請輸入金額" name="price" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="password">密碼: <b class="text-danger">(請輸入密碼)</b></label>
            <input type="password" class="form-control" id="password" placeholder="請輸入密碼" name="password" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">上架</button>
    </form>
</div>
@endsection