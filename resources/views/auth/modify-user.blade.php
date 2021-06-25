@extends('layouts.app')
@section('content')
<div class="container">
    <h2>修改會員資料</h2>
    @if ($hint === '1')
    <div class="alert alert-success">
        <strong>會員資料已完成修改</strong>
        <a href="{{route('modify.user')}}" class="alert-link">點擊此處重新整理頁面</a>
    </div>
    @elseif ($hint ==='2')
    <div class="alert alert-danger">
        <strong>密碼錯誤! </strong>資料未被修改
    </div>
    @endif
    <hr>
    <form action="{{route('modify.user.data')}}" class="was-validated" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <div class="form-group">
            <label for="uname">E-Mail:(不可修改)<label>
                    <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" style="width: 300px;" readonly>
        </div>
        <div class="form-group">
            <label for="name">使用者名稱:</label>
            <input type="text" class="form-control" id="name" placeholder="請輸入姓名:" name="name" value="{{Auth::user()->name}}" readonly>
        </div>
        <div class="form-group">
            <label for="sex">性別:</label>
            <select name="sex" id="sex" class="form-control">
                @if(Auth::user()->sex === 'M')
                <option value="M" selected>男生(Man)-目前性別</option>
                <option value="W">女生(Woman)</option>
                @else
                <option value="M">男生(Man)</option>
                <option value="W" selected>女生(Woman)-目前性別</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="telephone">電話:</label>
            <input type="text" class="form-control" id="telephone" placeholder="請輸入電話" name="telephone" value="{{Auth::user()->telephone}}" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <div class="form-group">
            <label for="birthday">生日:</label>
            <input type="text" class="form-control" id="birthday" placeholder="請輸入生日 xxxx/xx/xx" name="birthday" value="{{explode(' ',Auth::user()->birthday,2)[0]}}" required>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <div class="form-group">
            <label for="memo">備忘錄:</label>
            <textarea name="memo" id="memo" class="form-control" maxlength="255">{{Auth::user()->memo}}</textarea>
            <div class="valid-feedback">完成填寫</div>
            <div class="invalid-feedback">請填寫此欄位</div>
        </div>
        <div class="form-group">
            <label for="password">密碼: <b class="text-danger">(請輸入目前密碼以修改會員資料)</b></label>
            <input type="text" class="form-control" id="password" placeholder="請輸入密碼" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">送出修改</button>
    </form>
</div>
@endsection