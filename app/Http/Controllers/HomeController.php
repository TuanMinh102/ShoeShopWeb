<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    //Load San Pham
    public function homeview()
    {
        $giays = DB::table('giay')->select('*');
        $giays = $giays->get();     
        return view("home",compact('giays'));
    }
}
