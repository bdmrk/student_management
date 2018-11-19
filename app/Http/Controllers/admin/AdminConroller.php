<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminConroller extends Controller
{
    public function index(){
        return view('admin.index');
    }
//    public function dashboard(){
//        return view('admin.index');
//    }

}
