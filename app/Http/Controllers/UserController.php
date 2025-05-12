<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return view('admin1.users.list');
    }

    public function create()
    {
        return view('admin1.users.create');

    }
}
