<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformedController extends Controller
{
    public function index(){
        return view('pages.informed.index');
    }
}
