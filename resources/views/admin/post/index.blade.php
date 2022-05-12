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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{ asset('uploads/category/' . $item->image)}}" style="width: 48px;" alt=""></td>
                            <td>{{$item->status == 1? "Hidden" : "Show"}}</td>
                            <td>
                                <a href="{{ url('admin/edit-category/' . $item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-category/' . $item->id)}}" class="btn btn-danger">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection