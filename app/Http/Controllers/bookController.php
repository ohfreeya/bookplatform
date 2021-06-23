<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;
use App\User;
use Illuminate\Support\Facades\Hash;

class bookController extends Controller
{
    public function addBook()
    {
        return view('add-Book', ['hint' => '0']);
    }
    public function addBookData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!(Hash::check($data['password'], $user->password)))
            return view('add-Book', ['hint' => '2']);
        else {
            /* 新增資料時需如下，update才可以update的方式更新
            $update_data = [
                'name' => $data['name'],
                'ISBN' => $data['ISBN'],
                'author' => $data['author'],
                'price' => $data['price'],
                'seller_id' => $data['seller'],
            ];
            */
            $platform = new Platform();
            $platform->name = $data['name'];
            $platform->ISBN = $data['ISBN'];
            $platform->author = $data['author'];
            $platform->price = $data['price'];
            $platform->seller_id = $data['id'];
            $platform->save();
        }
        return view('add-Book', ['hint' => '1']);
    }
}
