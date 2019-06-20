<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index() {

        return view('admin.login.login');
    }

}

