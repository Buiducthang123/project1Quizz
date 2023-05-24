<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $test =  Test::all();
        return view("home",['tests'=>$test]);
    }
    
}
