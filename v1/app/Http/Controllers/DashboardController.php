<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_lists()
    {
        $pageTitle = 'Dashboard';
        return view('admin.dashboard.show',compact('pageTitle'));
    }
}
