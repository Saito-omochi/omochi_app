<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function showbypost(Sub $sub, Category $category)
    {
        $post = Post::where('category_id', $category->id)->withWhereHas('sub', function ($query) {
            $query->where('seacret', 0);
        })-> orderby('updated_at', 'DESC') -> paginate(30);//鍵垢になっているポストを取得しないように設定してからデータを取得している
        return view('categories.index')->with(["posts"=>$post, 'sub' => $sub, 'category' => $category]);
    }
    
    /*
    public function showbyuser(Sub $sub, Category $category)
    {
        $subs = //特定のカテゴリーを設定している人たちを集める
        $posts = 
        return view('category.index') -> with(['posts' => $posts]):
    }
    */
}
