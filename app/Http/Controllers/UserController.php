<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'menuAdminUser' => 'active',
            'title' => 'Data User',
        );
        return view('admin/user/index', $data);
    }
}
