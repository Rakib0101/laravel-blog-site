<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostRequestForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post = post::paginate(10);
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
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
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

    public function edit($post_id)
    {
        $category = Category::where('status', '0')->get();
        $post = post::find($post_id);
        return view('admin.post.update', compact('post' , 'category'));
    }

    public function update(PostRequestForm $request, $post_id)
    {
        $data = $request->validated();
        // return $data;
        $post = post::find($post_id);
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];

        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;

        $post->update();

        return redirect('admin/post')->with('status', 'post updated successfully');
    }

    public function destroy($post_id)
    {
        $post = post::find($post_id);
        // if($category){
        //     $destination = 'uploads/category/'.$category->image;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        //     $category->delete();
        //     return redirect('admin/category')->with('status', 'category deleted successfully');
        // }
        // else{
        //     return redirect('admin/category')->with('status', 'no category found');
        // }

            $post->delete();

        return redirect('admin/post')->with('status', 'post deleted successfully');
    }
}
