<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function showAddUserForm()
    {
    	return View('admin.addUser');
    }

    public function addUser(Request $request)
    {
    	User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    	return back();
    }
}
