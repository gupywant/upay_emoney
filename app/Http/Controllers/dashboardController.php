<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\transactionModel;
use App\Model\userModel;
use Session;

class dashboardController extends Controller
{
    public function index(){
    	$user_type = Session::get('user_type');
    	if($user_type === 'Admin'){
    		$data['card_1'] = false;
    		$data['card_2'] = false;
    		$data['card_3'] = true;
    		$data['card_4'] = true;
    		$data['total_amount'] = (transactionModel::where('id_user_plus', Session::get('id'))->sum('amount') * 0.02);
    		$data['transaction'] = transactionModel::orderBy('created_at','desc')->limit(5)->get();
    		$data['total_canteen'] = userModel::where('user_type', 2)->count();
    	}else if($user_type === 'Penjual'){
    		$data['card_1'] = false;
    		$data['card_2'] = false;
    		$data['card_3'] = true;
    		$data['card_4'] = false;
    		$total_amount = userModel::where('id_user', Session::get('id'))->first();
    		$data['total_amount'] = $total_amount->amount;
    		$data['total_amount_this_week'] = transactionModel::where('id_user_plus', Session::get('id'))->sum('amount');
    		$data['transaction'] = transactionModel::where('id_user_plus', Session::get('id'))->orderBy('created_at','desc')->limit(5)->get();
    	}else{
    		$data['card_1'] = true;
    		$data['card_2'] = true;
    		$data['card_3'] = false;
    		$data['card_4'] = false;
    		$total_amount = userModel::where('id_user', Session::get('id'))->first();
    		$data['total_amount'] = $total_amount;
    		$total_amount_this_week = transactionModel::where('id_user_minus', Session::get('id'))->sum('amount');
    		$data['total_amount_this_week'] =  ($total_amount_this_week * 0.02) + $total_amount_this_week;
    		$data['transaction'] = transactionModel::where('id_user_minus', Session::get('id'))->orWhere('id_user_plus', Session::get('id'))->orderBy('created_at','desc')->limit(5)->get();
    	}
    	return view('adminDashboard',$data);
    }
}
