<?php

namespace App\Http\Controllers\frontend;

use App\Models\post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::where('status', 0)->get();
        $post = post::paginate(1);
        return view('frontend.index', compact('post', 'category'));
    }
    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if($category)
        {
            $post = post::where('category_id', $category->id)->where('status', '0')->paginate(1);
            return view('frontend.post.index', compact('post', 'category'));
        }
        else
        {
            return redirect('/');
        }
    }
}
