@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Category</li>
        </ol>
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/edit-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control" rows="5">{{$category->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="d-block">Image</label>
                    <div class="d-flex">
                        <img src="{{asset('uploads/category/'.$category->image)}}" alt="" style=" width: 48px;"><input type="file" name="image" class="form-control">
                    </div>
                </div>

                <h6>SEO tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" name="meta_description"
                     class="form-control" rows="3">{{$category->meta_description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" name="meta_keyword"
                    class="form-control" rows="3">{{$category->meta_keyword}}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row mb-3">
                    <div class="col-md-3 col-6">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" {{$category->navebar_status == 1 ? 'checked':''}} name="navbar_status" id="">
                    </div>

                    <div class="col-md-3 col-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status == 1 ? 'checked':''}} name="status" id="">
                    </div>
                </div>
                <button type="submit" class="btn-primary btn">Save Category</button>
            </form>
        </div>
    </div>
</div>
@endsection