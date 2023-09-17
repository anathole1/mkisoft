<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $staffs = Staff::get();

        return view('frontend.team', compact('staffs'));
    }
}
