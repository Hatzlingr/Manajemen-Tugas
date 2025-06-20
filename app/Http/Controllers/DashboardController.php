<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'menuDashboard' => 'active',
            'title' => 'Dashboard',
            
        );
        return view('dashboard', $data);
    }
}
