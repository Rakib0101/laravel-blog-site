<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        return view("admin.user.index", compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if($user){
            $user->role_as = $request->role_as;
        }
        $user->update();

        return redirect('admin/users')->with('status', 'user updated successfully');
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user->delete();

        return redirect('admin/users')->with('status', 'user deleted successfully');
    }
}
