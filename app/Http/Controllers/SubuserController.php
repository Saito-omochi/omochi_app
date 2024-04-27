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
use Cloudinary;


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
            $f = Follow::where(['following_id' => $sub->id, 'followed_id' => $subview -> id]) -> exists();
            return view('subusers.showothers') -> with(['posts' => $posts, 'sub' => $sub, 'subview' => $subview, 'tf' => $f]);//他人のidが指定された場合は編集ができない画面に遷移
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
        array_push($followed_id, $sub->id);
        
        $posts = Post::with('sub')->where(function ($posts) use ($followed_id){
            $i = 0;
            foreach ($followed_id as $id){
                $where = (!$i) ? 'where' : 'orWhere';
                $i++;
                //dd($where);
                $posts -> $where("sub_id", '=', $id);
                //dd($posts);
            }
        })->orderby('updated_at', 'DESC')->get();
        
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
        //アイコン保存
        if($request -> file('img') != null){
            $img_url = Cloudinary::upload($request->file('img')->getRealPath()) -> getSecurePath();
            $input += ['icon' => $img_url];
        }else{//何も登録されなかった場合は、前のアイコンを引き継ぐ。
            $input['icon'] = $sub->icon;
        }
        
        $input = $request['user'];
        
        $sub -> fill($input) -> save();
        return redirect( $sub->id . "/profile/" . $sub->id);
    }
    
    public function follow(Sub $sub, Sub $follow, Follow $follows)
    {
        //新規フォローを登録する
        $f = Follow::where(['following_id' => $sub->id, 'followed_id' => $follow -> id]) -> exists();//すでにフォローしているのかどうかを確認する
        if($f == true){
            return redirect("/" . $sub->id . "/index");//何も処理をせずにホーム画面へ戻る
        }else{
            $follows['following_id'] = $sub -> id;
            $follows['followed_id'] = $follow -> id;
            $follows -> save();
            return redirect("/" . $sub->id . "/index");//フォローの登録をしてホーム画面へ戻る
        }
    }
    
    public function showfollows(Sub $sub, Follow $following)
    {
        $following = Follow::with('sub') -> where('following_id', $sub->id) -> get();
        //dd($following);
        return view('subusers.showfollows') -> with(['following' => $following]);
    }
    
    public function search(Sub $sub)
    {
        $categories = Category::all();
        return view('subusers.search') -> with(['sub' => $sub,'categories' => $categories]);
    }
    
    public function delfollow(Sub $sub, Sub $follow)//フォローを削除する
    {
        Follow::where(['following_id' => $sub->id, 'followed_id' => $follow->id]) -> delete();
        return redirect('/' . $sub->id . "/index");
    }
    
    public function delpost(Sub $sub,Post $post)
    {
        $post -> delete();
        return redirect('/' . $sub->id . "/profile/" . $sub->id);
    }
    
    public function showallposts(Sub $sub)
    {
        $post = Post::withWhereHas('sub', function ($query) {
            $query->where('seacret', 0);
        }) -> orderby('updated_at', 'DESC') -> paginate(30);//鍵垢になっているポストを取得しないように設定してからデータを取得している
        return view('subusers.showallposts')->with(["posts"=>$post, 'sub' => $sub]);
    }
    
    public function menu(Sub $sub)
    {
        return view('subusers.menu')->with(["sub"=>$sub]);
    }
}
