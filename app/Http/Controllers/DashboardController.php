<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('tasks')->select('status' ,DB::raw("COUNT('id') as count"))->groupBy('status')->get();
        return view('dashboard',compact('data'));
    }

}
