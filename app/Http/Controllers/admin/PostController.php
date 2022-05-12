<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostRequestForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $post = post::all();
        return view("admin.post.index", compact('post'));
    }
    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.post.create', compact('category'));
    }
    public function store(PostRequestForm $request)
    {
        $data = $request->validated();
        // return $data;
        $post = new post;
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];

        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect('admin/post')->with('status', 'post added successfully');
    }
}
