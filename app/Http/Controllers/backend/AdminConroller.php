<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminConroller extends Controller
{
    public function index(){
        return view('backend.index');
    }
//    public function dashboard(){
//        return view('backend.index');
//    }

}
