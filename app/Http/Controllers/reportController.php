<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\transactionModel;
use Session;

class reportController extends Controller
{
    public function salesList(Request $request) {
    	$data['table'] = true;
        $id = Session::get('id');
        $data['sales'] = transactionModel::where('id_user_plus', $id)->orderBy('created_at','desc')->get();
    	return view('salesList',$data);
    }

    public function transactionList(Request $request) {
    	$data['table'] = true;
    	$id = Session::get('id');
        $data['transaction'] = transactionModel::select('user.name', 'user.id_user','transaction.note', 'transaction.amount', 'transaction.created_at')->leftJoin('user','user.id_user','=','transaction.id_user_plus')->where('transaction.id_user_plus', $id)->orWhere('transaction.id_user_minus', $id)->orderBy('transaction.created_at','desc')->get();
        
    	return view('transactionList',$data);
    }
}
