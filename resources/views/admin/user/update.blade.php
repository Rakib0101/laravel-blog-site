@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    <div class="card">
        <div class="card-header">
            <h1>Edit User</h1>
        </div>
        <div class="card-body">
            <table class="table table-border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_as == 1? "Admin" : "User"}}</td>
                        </tr>
                    </tbody>
                </table>

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/edit-user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Role As</label>
                    <select name="role_as" id="" class="form-control">
                        <option value="1" {{$user->role_as == 1 ? 'selected': ''}}>Admin</option>
                        <option value="0" {{$user->role_as == 0 ? 'selected': ''}}>User</option>
                        <option value="2" {{$user->role_as == 2 ? 'selected': ''}}>Blogger</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary btn">Change Role</button>
            </form>
        </div>
    </div>
</div>
@endsection