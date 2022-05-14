@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
    <div class="card">
        <div class="card-header">
            <h1>Edit Post</h1>
        </div>
        <div class="card-body">
            
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/edit-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{$item->id}}" {{$post->category_id == $item->id ? 'selected': ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Title</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control" id="my_summernote" rows="5">{{$post->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Code</label>
                    <input type="text" name="yt_iframe" value="{{$post->yt_iframe}}" class="form-control">
                </div>
                <h6>SEO tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" name="meta_description"
                     class="form-control" id="my_summernote" rows="3">{{$post->meta_description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" name="meta_keyword"
                    class="form-control" rows="3">{{$post->meta_keyword}}</textarea>
                </div>

                <h6>Status Mode</h6>

                    <div class="col-md-3 col-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{$post->status == 1 ? 'checked':''}} name="status" id="">
                    </div>
                <button type="submit" class="btn-primary btn">Save Post</button>
            </form>
        </div>
    </div>
</div>
@endsection