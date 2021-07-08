@extends('layouts.app')
@section('content')
<div class="container">
    <h2>上架書籍</h2>
    @if ($hint === '1')
    <div class="alert alert-success">
        <strong>已完成修改</strong>
        <a href="{{route('home')}}" class="alert-link">點擊此處回到首頁</a>
    </div>
    @elseif ($hint === "2")
    <div class="alert alert-danger">
        <strong>密碼輸入錯誤! </strong>資料未被修改
    </div>
    @endif
    <hr>
    <form action="{{ route('add.Book.data') }}" class="was-validated" method="POST">
        @csrf
        <input type="hidden" name="seller_id" value="{{Auth::user()->id}}">
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
            <label for="publisher">出版商: <b class="text-danger">(請輸入出版商)</b></label>
            <input type="text" class="form-control" id="publisher" placeholder="請輸入出版商" name="publisher" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="publishDate">出版日期: <b class="text-danger">(請輸入出版日期)</b></label>
            <input type="text" class="form-control" id="publishDate" placeholder="請輸入出版日期" name="publishDate" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="edition">再版: <b class="text-danger">(請輸入再版)</b></label>
            <input type="text" class="form-control" id="edition" placeholder="請輸入再版" name="edition" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="language">語言: <b class="text-danger">(請輸入語言)</b></label>
            <input type="text" class="form-control" id="language" placeholder="請輸入語言" name="language" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="bookStatus">書況: <b class="text-danger">(請輸入書況)</b></label>
            <input type="text" class="form-control" id="bookStatus" placeholder="請輸入書況" name="bookStatus" required>
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