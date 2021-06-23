@extends('layouts.app')
@section('content')
<div class="container">
    <h2>修改會員密碼</h2>
    @if ($hint === '1')
    <div class="alert alert-success">
        <strong>會員密碼已完成修改</strong>
        <a href="{{route('modify.user')}}" class="alert-link">點擊此處重新整理頁面</a>
    </div>
    @elseif ($hint ==='2')
    <div class="alert alert-danger">
        <strong>密碼輸入錯誤! </strong>資料未被修改
    </div>
    @elseif ($hint ==='3')
    <div class="alert alert-danger">
        <strong>確認密碼輸入錯誤! </strong>資料未被修改
    </div>
    @endif
    <hr>
    <form action="{{route('modify.user.pwd.data')}}" class="was-validated" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="password-old">舊密碼: <b class="text-danger">(請輸入舊密碼)</b></label>
            <input type="password" class="form-control" id="password-old" placeholder="請輸入密碼" name="password-old" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <hr>
        <div class="form-group">
            <label for="password-new">新密碼: </label>
            <input type="password" class="form-control" id="password-new" placeholder="請輸入新密碼" name="password-new" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <div class="form-group">
            <label for="password-conf">密碼確認: </label>
            <input type="password" class="form-control" id="password-conf" placeholder="請再次輸入新密碼" name="password-conf" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">修改密碼</button>
    </form>
</div>
@endsection