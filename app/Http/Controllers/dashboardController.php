<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

    	$data['kueBaru'] = [];//Kue::orderBy('created_at','desc')->limit(5)->get();
    	$data['userBaru'] = [];//User::orderBy('created_at','desc')->limit(5)->get();
    	return view('adminDashboard',$data);
    }
}
