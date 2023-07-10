<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(Request $request)
    {
        $users = User::paginate(50);
        return view('admin.users',[
            'users' => $users
        ]);
    }
}
