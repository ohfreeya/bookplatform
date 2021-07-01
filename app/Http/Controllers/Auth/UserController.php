<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; //透過 Model 對應到資料表
use Illuminate\Support\Facades\Hash; //引入 Hash類別，用於密碼雜湊生成

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        //設定所有 UserController 中的函數皆經過 auth 中介層，也就是將函數加入認證機制中
    }
    public function setting(){
        return view('auth.setting');
    }
    public function modifyUser()
    {
        return view('auth.modify-user', ['hint' => '0']);
    }
    public function modifyUserData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!(Hash::check($data['password'], $user->password)))
            return view('auth.modify-user', ['hint' => '2']);
        else {
            $update_data = [
                'name' => $data['name'],
                'sex' => $data['sex'],
                'telephone' => $data['telephone'],
                'birthday' => $data['birthday'],
                'memo' => $data['memo'],
            ];
            $user->update($update_data);
        }
        return view('auth.modify-user', ['hint' => '1']);
    }
    public function modifyUserPwd()
    {
        return view('auth.modify-pwd', ['hint' => '0']);
    }
    public function modifyUserPwdData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!Hash::check($data['password-old'], $user->password))
            return view('auth.modify-pwd', ['hint' => '2']);
        else {
            if ($data['password-new'] === $data['password-conf']) {
                $update_data = [
                    'password' => Hash::make($data['password-new']),
                ];
                $user->update($update_data);
                return view('auth.modify-pwd', ['hint' => '1']);
            } else {
                return view('auth.modify-pwd', ['hint' => '3']);
            }
        }
    }
    public function deleteUser()
    {
        return view('auth.delete-user', ['hint' => '0']);
    }
    public function deleteUserData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!Hash::check($data['password'], $user->password)) {
            return view('auth.delete-user', ['hint' => '2']);
        } else {
            $user->delete();
            return view('auth.delete-user', ['hint' => '1']);
        }
    }
}
