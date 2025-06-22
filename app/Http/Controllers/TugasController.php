<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $data = array(
            'menuAdminTugas' => 'active',
            'title' => 'Data Tugas',
        );
        return view('admin/tugas/index', $data);
    }
}
