@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Posts</li>
            </ol>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>View category <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a></h5>
            </div>
            <div class="acrd-body">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Post Title</th>
                            <th>Post Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->status == 1? "Hidden" : "Visible"}}</td>
                            <td>
                                <a href="{{ url('admin/edit-post/' . $item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-post/' . $item->id)}}" class="btn btn-danger">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{$post->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection