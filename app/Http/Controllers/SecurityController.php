<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SecurityController extends Controller
{
    public function index(){
        //get user with role admin or invited
        ;
        return view('users.withRole',  [
            'users' => User::role(['admin','invited'])->get()
        ]);
    }

    public function admins(){
        return view('users.admins',  [
            'users' => User::role('admin')->get()
        ]);
    }

    public function permission(){
        //get user with permission create::role (permission 2)
        return view('users.permission',  [
            'users' => User::permission('create::role')->get()
        ]);
    }
}
