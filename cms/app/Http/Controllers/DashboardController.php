<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->data['page_title'] = 'Dashboard';
    	$this->middleware('auth');
    }

    public function showDashboard()
    {
        return view('dashboard',$this->data);
    }
}
