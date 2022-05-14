@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Users</li>
            </ol>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>View User</h5>
            </div>
            <div class="acrd-body">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_as == 1? "Admin" : "User"}}</td>
                            <td>
                                <a href="{{ url('admin/edit-user/' . $user->id)}}" class="btn btn-success {{ $user->role_as == 1 ? 'disabled' : '' }} ">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-user/' . $user->id)}}" 
                                 class="btn btn-danger {{ $user->role_as == 1 ? 'disabled' : '' }} ">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{$users->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .w-5{
        display: none;
    }
</style>