<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function about(){
        
      $abouts=  DB::table('abouts')->get();
    //   $programs =  Program::with('category')->get();
      $background=  DB::table('backgrounds')->get();
    //   $staffs=  DB::table('staff')->get();

      return view('welcome', compact('abouts','background'));
    }
}
