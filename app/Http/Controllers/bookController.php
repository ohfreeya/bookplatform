<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\Author;
use App\Publisher;
use App\BookAuthor;
use App\GoodAuthor;
use App\Goods;
use Brick\Math\BigInteger;
use DB;
use Illuminate\Support\Facades\Hash;

class bookController extends Controller
{
    public function addBook()
    {
        return view('add-Book', ['hint' => '0']);
    }
    public function addBookData(Request $data)
    {
        $user = User::findOrFail($data['seller_id']);
        if (!(Hash::check($data['password'], $user->password)))
            return view('add-Book', ['hint' => '2']);
        else {
            $authorid = $this::checkAuthor($data['author']);
            $publisherid = $this::checkPublisher($data['publisher']);
            $Bookid = $this::checkBookExist($data, $publisherid);
            $this::bookAuthor($Bookid, $authorid);
            $goodid = $this::createGood($data, $Bookid, $publisherid);
            $this::AuthorGood($authorid, $goodid);
        }
        return view('add-Book', ['hint' => '1']);
    }
    protected static function AuthorGood(String $authorid, String $goodid)
    {
        $arr = [
            'goodid' => $goodid,
            'authorid' => $authorid,
        ];
        GoodAuthor::Create($arr);
    }
    protected static function createGood($data, $Bookid, $publisherid)
    {
        $arr = [
            'bookid' => $Bookid,
            'ISBN' => $data['ISBN'],
            'name' => $data['name'],
            'publisherid' => $publisherid,
            'publishDate' => $data['publishDate'],
            'edition' => $data['edition'],
            'language' => $data['language'],
            'sellerid' => $data['seller_id'],
            'bookStatus' => $data['bookStatus'],
            'price' => $data['price'],
            'isDelete' => 0,
        ];
        $goods = Goods::Create($arr);
        return $goods->id;
    }
    protected static function bookAuthor($Bookid, $authorid)
    {
        $arr = [
            'bookid' => $Bookid,
            'authorid' => $authorid,
        ];
        BookAuthor::firstOrCreate($arr);
    }
    protected static function checkBookExist($data, String $publisherid)
    {
        if (Books::where(['ISBN' => $data['ISBN']])->exists()) {
            $check = Books::where(['ISBN' => $data['ISBN']])->first();
            return $check->id;
        } else {
            $arr = [
                'name' => $data['name'],
                'ISBN' => $data['ISBN'],
                'publisherid' => $publisherid,
                'publishDate' => $data['publishDate'],
                'edition' => $data['edition'],
                'language' => $data['language'],
            ];
            $checkBookExist = Books::Create($arr);
            return $checkBookExist->id;
        }
    }
    //?????????
    protected static function checkAuthor(String $author)
    {
        $check = Author::firstOrCreate(['author' => $author]);
        return $check->id;
    }
    //????????????
    protected static function checkPublisher(String $publisher)
    {
        $check = Publisher::firstOrCreate(['publisher' => $publisher]);
        return $check->id;
    }
    public function searchBook(Request $data)
    {
        $arr1 = ['name' => $data['Search'],];
        $arr2 = ['author' => $data['Search'],];
        $book_info = DB::table('books')->distinct()->where($arr1)->orwhere($arr2)->get();
        return view('home', ['book_info' => $book_info]);
    }
}
