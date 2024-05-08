<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class dashboardController extends Controller
{
    public function dashboardUser() {
        return view('dashboard');
    }
}
