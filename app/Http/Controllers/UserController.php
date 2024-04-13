<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Sub;
use App\Models\Category;

class UserController extends Controller
{
    public function index()//twitterでいうhomeの画面をイメージしている
    {
        return view('users.index');
    }
    
    public function subregister()
    {
        $userid = Auth::id(); //現在認証しているユーザーのidを取得する
        $user = User::all()->find($userid); //現在認証しているユーザーのidでユーザー情報をとってくる
        return view('users.register')->with(['user'=>$user]); //viewに渡す
    }
    
    public function store(Request $request, Sub $sub)
    {
        $input = $request['user'];
        $input['user_id'] = Auth::id();
        $sub->fill($input)->save();
        return redirect('/profile/select');
    }
    
    public function select()
    {
        $userid = Auth::id();//現在認証しているユーザーのidを取得する
        $subs = Sub::where('user_id', $userid)-> get();//現在認証している親ユーザーのidに紐づけられたサブユーザーをすべて取得
        return view('users.select')->with(['subs' => $subs]);//
    }
}
