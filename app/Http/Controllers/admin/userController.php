<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    // user view
    public function index()
    {
        $user['users'] = User::all();
        return view('admin.user.index',$user);
    }
    // user edit
    public function edit($user_id)
    {
        $user['users'] = User::find($user_id);
        return view('admin.user.edit',$user);        
    }
    // update edit
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if($user){
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message','User Updated successfully');
        }
    }
}
