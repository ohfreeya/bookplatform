<?php

namespace App\Http\Controllers\auth;

use App\Cart;
use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function management(Request $data)
    {
        $book_info = DB::table('goods')
            ->distinct()
            ->where(['sellerid' => $data['id'], 'isDelete' => 0])
            ->join('good_authors', 'goods.id', 'good_authors.goodid')
            ->join('authors', 'good_authors.authorid', 'authors.id')
            ->get();
        return view('management', ['book_info' => $book_info]);
    }
    public function editGood(Request $data)
    {
        $book_info = DB::table('goods')
            ->distinct()
            ->where(['goods.id' => $data['goodid']])
            ->join('publishers', 'goods.publisherid', 'publishers.id')
            ->join('good_authors', 'goods.id', 'good_authors.goodid')
            ->join('authors', 'good_authors.authorid', 'authors.id')
            ->get();
        return view('editGood', ['good' => $book_info, 'hint' => 0]);
    }
    public function editGoodData(Request $data)
    {
        $user = User::findOrFail($data['seller_id']);
        $good = Goods::findOrFail($data['goodid'])
            ->distinct()
            ->join('publishers', 'goods.publisherid', 'publishers.id')
            ->join('good_authors', 'goods.id', 'good_authors.goodid')
            ->join('authors', 'good_authors.authorid', 'authors.id')
            ->get();
        if (!(Hash::check($data['password'], $user->password)))
            return view('editGood', ['good' => $good, 'hint' => '2']);
        else {
            $arr = [
                'name' => $data['name'],
                'publishDate' => $data['publishDate'],
                'edition' => $data['edition'],
                'language' => $data['language'],
                'bookStatus' => $data['bookStatus'],
                'price' => $data['price'],
            ];
            Goods::find($data['goodid'])->update($arr);
            $update_good = Goods::find($data['goodid'])->get();
            return view('editGood', ['good' => $update_good, 'hint' => '1']);
        }
    }
    public function deleteGood(Request $data)
    {
        $good = Goods::findOrFail($data['goodid']);
        $good->isDelete = 1;
        $good->save();
        $book_info = DB::table('goods')
            ->distinct()
            ->where(['sellerid' => $data['sellerid'], 'isDelete' => 0])
            ->join('good_authors', 'goods.id', 'good_authors.goodid')
            ->join('authors', 'good_authors.authorid', 'authors.id')
            ->get();
        return view('management', ['book_info' => $book_info]);
    }
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart'); //cart partion
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function getAddToCart(Request $request, $id)
    {
        $good = Goods::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($good, $good->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }
    public function getReductByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reductByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart.index');
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart.index');
    }
    public function getCheckout()
    {
    }
    public function postCheckout(Request $request)
    {
    }
    /*
    public function trade_record()
    {
    }
    public function trade()
    {
    }
    public function TBD()
    { //To Be Determind

    }*/
}
