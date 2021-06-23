@extends('layouts.app')
@section('content')
<div class="container">
    <h2>刪除會員帳號</h2>
    @if ($hint === '1')
    <div class="alert alert-success">
        <strong>會員已經刪除完成</strong>
        <a href="{{route('home')}}" class="alert-link">點擊此處重新整理頁面</a>
    </div>
    @elseif ($hint ==='2')
    <div class="alert alert-danger">
        <strong>目前密碼錯誤! </strong>會員未被刪除
    </div>
    @endif
    <hr>
    <form action="{{route('delete.user.data')}}" class="was-validated" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="password">密碼: <b class="text-danger">(請輸入目前密碼以修改會員資料)</b></label>
            <input type="password" class="form-control" id="password" placeholder="請輸入密碼" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">刪除帳號</button>
    </form>
</div>
@endsection