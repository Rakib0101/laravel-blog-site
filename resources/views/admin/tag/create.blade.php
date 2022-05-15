@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control" id="my_summernote" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
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
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" id="">
                    </div>

                    <div class="col-md-3 col-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="">
                    </div>
                </div>
                <button type="submit" class="btn-primary btn">Save Category</button>
            </form>
        </div>
    </div>
</div>
@endsection