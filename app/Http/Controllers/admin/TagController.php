<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\TagFormRequest;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $category = Tag::paginate(10);
        return view("admin.category.index", compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(TagFormRequest $request)
    {
        $data = $request->validated();
        // return $data;
        $category = new Tag;
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1': '0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/category')->with('status', 'category added successfully');
    }

    public function edit($category_id)
    {
        $category = Tag::find($category_id);
        return view('admin.category.update', compact('category'));
    }

    public function update(TagFormRequest $request, $category_id)
    {
        $data = $request->validated();
        // return $data;
        $category = Tag::find($category_id);
        $category->name = $data['name'];
        $category->Str::slug($data['slug']);
        $category->description = $data['description'];

        if($request->hasFile('image')){

            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1': '0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('status', 'category updated successfully');
    }

    public function destroy($category_id)
    {
        $category = Tag::find($category_id);
        if($category){
            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->delete();
            return redirect('admin/category')->with('status', 'category deleted successfully');
        }
        else{
            return redirect('admin/category')->with('status', 'no category found');
        }
    }
}
