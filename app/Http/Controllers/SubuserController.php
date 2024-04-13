<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Sub;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class SubuserController extends Controller
{
    public function show(Sub $sub, Sub $subview)//特定の人の投稿のみを取り出して表示する。
    {
        $posts = Post::where('sub_id', $subview -> id)->orderby('updated_at', 'DESC') -> get();//表示したいユーザーの投稿を取得する
        //dd($posts);
        
        if($subview -> user_id == Auth::id()){
            return view('subusers.show') -> with(['posts' => $posts, 'sub' => $sub]);//プロフィールや投稿の編集が可能な画面を返す
        }else{
            //フォロー情報を入手し、
            return view('subusers.showothers') -> with(['posts' => $posts, 'sub' => $sub, 'subview' => $subview]);//他人のidが指定された場合は編集ができない画面に遷移
        }
    }
    
    public function edit(Sub $sub)
    {
        if($sub_id -> user_id = Auth::id()){
            //今のサブユーザーの情報
            //カテゴリーの情報
            $categories = Category::all();
            return view('subusers.create') -> with(['sub' => $sub_id, 'categories' => $categories]);
        }else{//自分のサブユーザーでないなら編集権限がないことを表示するページに遷移し、indexに戻るボタンを用意しておく
            return view('subusers.usererror');
        }
    }
    
    public function index(Sub $sub)//フォローしているユーザーの投稿を一覧表示する
    {
        
        $follows = Follow::select('followed_id') -> where('following_id', $sub->id) -> get();//subがフォローしている人をとってくる。
        $followed_id = array();
        foreach($follows as $follow){
            array_push($followed_id, $follow -> followed_id);//followed_idだけを取り出してリストfollowed_idに格納する
        }
        //dd($followed_id);
        //$posts = Post::with('sub')->where('sub_id', '=' , $followed_id) -> orwhere( 'sub_id','=',9)->get();//フォローしている人たちのidリストを条件にしてそのアカウントの投稿を取得する
        
        $posts = Post::with('sub')->where(function ($posts) use ($followed_id){
            $i = 0;
            foreach ($followed_id as $id){
                $where = (!$i) ? 'where' : 'orWhere';
                $i++;
                //dd($where);
                $posts -> $where("sub_id", '=', $id);
                //dd($posts);
            }
        })->get();
        
        //dd($posts);
        return view('subusers.index') -> with(['sub' => $sub, 'posts' => $posts, 'follows' => $follows]);
    }
    
    public function create(Sub $sub, Category $category)//投稿作成
    {
        if($sub -> user_id = Auth::id()){
            //今のサブユーザーの情報
            //カテゴリーの情報
            $categories = Category::all();
            return view('subusers.create') -> with(['sub' => $sub, 'categories' => $categories]);
        }else{//自分のサブユーザーでないなら編集権限がないことを表示するページに遷移し、indexに戻るボタンを用意しておく
            return view('subusers.usererror');
        }
    }
    
    public function store(Request $request, Sub $sub, Post $post)//作成した投稿を保存する
    {
        $input = $request['post'];
        $input['sub_id'] = $sub -> id;
        $post -> fill($input) -> save();
        return redirect("/" . $sub->id . '/profile/' . $sub->id);
    }
    
    public function profileedit(Sub $sub)
    {
        $categories = Category::all();
        return view('subusers.useredit') -> with(['sub' => $sub, 'categories' => $categories]);
    }
    
    public function update(Request $request, Sub $sub)
    {
        $img = $request -> file('icon');
        if($img != null){
            $path = $img -> store('public/icon');
            $sub -> icon = basename($path);
        }else{
            $sub->icon="default.png";
        }
        
        $input = $request['user'];
        
        $sub -> fill($input) -> save();
        return redirect( $sub->id . "/profile/" . $sub->id);
    }
    
    public function follow(Sub $sub, Sub $follow, Follow $follows)
    {
        //新規フォローを登録する
        $follows['following_id'] = $sub -> id;
        $follows['followed_id'] = $follow -> id;
        $follows -> save();
        return redirect("/" . $sub->id . "/index");
    }
    
    public function showfollows(Sub $sub, Follow $following)
    {
        $following = Follow::with('sub') -> where('following_id', $sub->id) -> get();
        //dd($following);
        return view('subusers.showfollows') -> with(['following' => $following]);
    }
    
    /*
    public function deletepost(Post $post, Sub $sub)
    {
        
    }
    */
}
