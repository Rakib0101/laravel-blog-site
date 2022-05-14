@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add Post</li>
        </ol>
    <div class="card">
        <div class="card-header">
            <h1>Add Post</h1>
        </div>
        <div class="card-body">
            
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post title</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" id="my_summernote" name="description" id="my_summernote" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Code</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h6>SEO tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" name="meta_description" class="form-control" id="my_summernote" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row mb-3">
                    <div class="col-md-3 col-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="">
                    </div>
                </div>
                <button type="submit" class="btn-primary btn">Save Post</button>
            </form>
        </div>
    </div>
</div>
@endsection