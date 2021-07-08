<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\Author;
use App\Publisher;
use App\BookAuthor;
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
            $this::createGood($data, $Bookid, $publisherid);
        }
        return view('add-Book', ['hint' => '1']);
    }
    protected static function createGood($data, $Bookid, $publisherid)
    {
        $good = new Goods();
        $good->bookid = $Bookid;
        $good->ISBN = $data['ISBN'];
        $good->name = $data['name'];
        $good->publisherid = $publisherid;
        $good->publishDate = $data['publishDate'];
        $good->edition = $data['edition'];
        $good->language = $data['language'];
        $good->sellerid = $data['seller_id'];
        $good->bookStatus = $data['bookStatus'];
        $good->price = $data['price'];
        $good->isDelete = 0;
        $good->save();
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
        if (Books::where(['ISBN'=>$data['ISBN']])->exists()) {
            $check = Books::where(['ISBN'=>$data['ISBN']])->first();
            return $check->id;
        } 
        else {
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
    //找作者
    protected static function checkAuthor(String $author)
    {
        $check = Author::firstOrCreate(['author' => $author]);
        return $check->id;
    }
    //找出版商
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
