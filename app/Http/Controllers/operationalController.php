<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use App\Model\userModel;
use App\Model\transactionModel;

class operationalController extends Controller
{

	public function readCardIndex(Request $request) {
		$id = Session::get('id');
		$user = userModel::where('id_user', $id)->first();
		$data['machine_id'] = $user->machine_id;
    	return view('readCard', $data);
    }

    public function readedCardIndex(Request $request, $card_id) {
		$user = userModel::where('card_id', $card_id)->first();
		if(!empty($user)){
			$data['user'] = $user;
			$data['id'] = $user->id_user;
	    	return view('readedCard', $data);
	    }else{
	    	return back()->with('alert','Kartu salah atau belum terdaftar!!');
	    }
    }

    public function transactionIndex(Request $request) {
    	$id = Session::get('id');
		$user = userModel::where('id_user', $id)->first();
		$data['machine_id'] = $user->machine_id;
    	return view('transaction', $data);
    }

    public function transactionReadedIndex(Request $request, $card_id) {
    	$user = userModel::where('card_id', $card_id)->first();
		if(!empty($user)){
			$data['card_id'] = $card_id;
	    	return view('transactionRead', $data);
	    }else{
	    	return back()->with('alert','Kartu salah atau belum terdaftar!!');
	    }
    }

    public function transactionMinus(Request $request, $card_id) {

    	date_default_timezone_set("Asia/jakarta");

        $date = Date('Y-m-d H:i:s');

    	$user = userModel::where('card_id', $card_id)->first();
	
    	$add = new transactionModel;
    	$add->amount = $request->amount;
    	$add->note = "Buy";
    	$add->id_user_minus = $user->id_user;
    	$add->id_user_plus = Session::get('id');
        $add->updated_at = $date;
        $add->created_at = $date;
        $add->save();

		$update = array(
			'amount' => $user->amount - $request->amount - ($request->amount * 0.02)
		);

		userModel::where('card_id',$card_id)->update($update);


		$user = userModel::where('id_user', 1)->first();

		$update = array(
			'amount' => $user->amount + ($request->amount * 0.02)
		);

		userModel::where('id_user',1)->update($update);

		$user = userModel::where('id_user', Session::get('id'))->first();

		$update = array(
			'amount' => $user->amount + $request->amount
		);

		userModel::where('id_user',Session::get('id'))->update($update);


    	return back()->with('message','Berhasil Melakukan Transaksi');
    }

    public function topupIndex(Request $request) {
    	$id = Session::get('id');
		$user = userModel::where('id_user', $id)->first();
		$data['machine_id'] = $user->machine_id;
    	return view('topup', $data);
    }

    public function topupReadedIndex(Request $request, $card_id) {
    	$user = userModel::where('card_id', $card_id)->first();
		if(!empty($user)){
			$data['card_id'] = $card_id;
	    	return view('topupRead', $data);
	    }else{
	    	return back()->with('alert','Kartu salah atau belum terdaftar!!');
	    }
    }

    public function topupAdd(Request $request, $card_id) {

    	date_default_timezone_set("Asia/jakarta");

        $date = Date('Y-m-d H:i:s');

    	$user = userModel::where('card_id', $card_id)->first();
	
    	$add = new transactionModel;
    	$add->amount = $request->amount;
    	$add->note = "Top Up";
    	$add->id_user_minus = 1;
    	$add->id_user_plus = $user->id_user;
        $add->updated_at = $date;
        $add->created_at = $date;
        $add->save();

		$update = array(
			'amount' => $user->amount + $request->amount
		);

		userModel::where('card_id',$card_id)->update($update);


    	return back()->with('message','Berhasil Top Up');
    }

    public function withdrawIndex(Request $request) {
        $id = Session::get('id');
        $user = userModel::where('id_user', $id)->first();
        $data['machine_id'] = $user->machine_id;
        return view('withdraw', $data);
    }

    public function withdrawReadedIndex(Request $request, $card_id) {
        $user = userModel::where('card_id', $card_id)->first();
        if(!empty($user)){
            $data['card_id'] = $card_id;
            $data['total_balance'] = $user->amount;
            return view('withdrawRead', $data);
        }else{
            return back()->with('alert','Kartu salah atau belum terdaftar!!');
        }
    }

    public function withdrawAdd(Request $request, $card_id) {

        date_default_timezone_set("Asia/jakarta");

        $date = Date('Y-m-d H:i:s');

        $user = userModel::where('card_id', $card_id)->first();
    
        if($request->amount < $user->amount){
            $add = new transactionModel;
            $add->amount = $request->amount;
            $add->note = "Withdraw";
            $add->id_user_minus = 1;
            $add->id_user_plus = $user->id_user;
            $add->updated_at = $date;
            $add->created_at = $date;
            $add->save();

            $update = array(
                'amount' => $user->amount - $request->amount
            );

            userModel::where('card_id',$card_id)->update($update);


            return back()->with('message','Berhasil Withdraw');
        }else{
            return back()->with('alert','Penarikan melebih saldo!!');
        }
    }

    public function readID(Request $request) {

        $path = public_path().'/filesdat/'.$request->machine_id;
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0770, true, true);
        }

        date_default_timezone_set("Asia/jakarta");
	    $date = date('D M d Y H:i:s O');	

        File::put($path.'/data.json','{ "card_id": "'.$request->card_id.'", "machine_id": "'.$request->machine_id.'", "read_date": "'.$date.'" }');

        $data["card_id"] = $request->card_id;
        $data["machine_id"] = $request->machine_id;
        $data["read_date"] = $date;
        return response($data, 200, ['Content-Type => application/json']);
    }
}
