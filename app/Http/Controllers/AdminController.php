<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('adminpages.dashboard');
    }

    // public function index(Request $request){
    //     $users = User::get();
    //     $level = $users->level;
    //     // $level = $users->level;
    //     if($level == 1 || $level == 2){
    //         return view('adminpages.dashboard');
    //     }else{
    //         return redirect()->back()->with('error', 'Bạn không phải là quản trị viên!');
    //     }
    // }
    
}
