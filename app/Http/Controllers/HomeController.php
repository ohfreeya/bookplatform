<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $good_info = Goods::where(['isDelete'=>'0'])
            ->join('good_authors', 'goods.id', 'good_authors.goodid')
            ->join('authors', 'good_authors.authorid', 'authors.id')
            ->paginate();
        return view('home', ['good_info' => $good_info]);
    }
}
