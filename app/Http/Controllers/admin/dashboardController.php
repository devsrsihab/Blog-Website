<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\posts;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {

        $categories    = categories::count();
        $posts        = posts     ::count();
        $normal_users = User      ::where('role_as','0')->count();
        $editor_users = User      ::where('role_as','2')->count();
        $admin_users  = User      ::where('role_as','1')->count();
        return view('admin.dashboard',compact('categories','posts','normal_users','editor_users','admin_users'));
    }
}
