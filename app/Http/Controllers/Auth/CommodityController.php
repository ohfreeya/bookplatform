<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommodityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function management(Request $data)
    {
        /*$id =User::findOrFail($data['id']);
        $arr=[
            'seller_id'=>$id,
        ];*/
        $book_info = DB::table('platforms')->distinct()->where('seller_id',$data['id'])->get();
        return view('management', ['book_info' => $book_info]);
    }
    public function trade_record()
    {
    }
    public function trade()
    {
    }
    public function TBD()
    { //To Be Determind

    }
}
