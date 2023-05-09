<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('back.Dashboard.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('back.login.show');
    }
}
