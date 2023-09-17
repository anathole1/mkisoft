<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramFrontController extends Controller
{
    public function index(){
        $programs =  Program::with('category')->get();

        return view('frontend.programs',compact('programs'));
    }
}
