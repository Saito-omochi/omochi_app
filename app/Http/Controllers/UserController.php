<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Sub;
use App\Models\Category;
use App\Models\Post;
use Cloudinary;

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
        $img_url = Cloudinary::upload($request->file('img')->getRealPath()) -> getSecurePath();
        $input += ['icon' => $img_url];
        $sub->fill($input)->save();
        return redirect('/profile/select');
    }
    
    public function select()
    {
        $userid = Auth::id();//現在認証しているユーザーのidを取得する
        $subs = Sub::where('user_id', $userid)-> get();//現在認証している親ユーザーのidに紐づけられたサブユーザーをすべて取得
        return view('users.select')->with(['subs' => $subs]);//
    }
    
    public function show(Post $posts)
    {
        $posts = Post::withWhereHas('sub', function ($query) {
            $query->where('user_id', Auth::id());
        }) -> orderby('updated_at', 'DESC') -> paginate(30);
        return view('users.show') -> with(['posts' => $posts]);
    }
    
    public function menu()
    {
        $sub = Sub::where('user_id', Auth::id()) -> get();
        return view('users.menu')->with(["subs"=>$sub]);
    }
}
