<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $title = 'Dashboard';
        $data = compact('title');
        return view('admin.dashboard', $data);
    }
}
