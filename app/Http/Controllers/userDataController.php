<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\userModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;


class userDataController extends Controller
{
    public function addIndex(){
    	return view('userAdd');
    }

    public function add(Request $request){

        date_default_timezone_set("Asia/jakarta");

        $date = Date('Y-m-d H:i:s');

        $user = userModel::where('username',$request->username)->first();
        if(empty($user->username)){
        	$password = Str::random(8);

            $add = new userModel;
            $add->name = $request->name;
            $add->username = $request->username;
            $add->password = Hash::make($password);
            $add->gender = $request->gender;
            $add->phone = $request->phone;
            $add->user_type = $request->user_type;
            $add->card_id = $request->card_id;
            $add->machine_id = $request->machine_id;
            $add->amount = $request->amount;
            $add->updated_at = $date;
            $add->created_at = $date;
            $add->save();

            return back()->with('message',"User Berhasil ditambah, Login dengan username <strong>$request->username</strong> dan password <strong>$password</strong>");
        }else{
            return back()->with('alert',"Email sudah dipakai");
        }

    }

    public function userList(Request $request, $type) {
    	$data['table'] = true;
    	$data['user'] = userModel::where('user_type', $type)->get();
    	return view('userList',$data);
    }

    public function editIndex(Request $request, $id) {
    	$data['user'] = userModel::where('id_user',$id)->first();
    	$data['id'] = $data['user']->id_user;
    	return view('userEdit',$data);
    }


    public function edit(Request $request,$id){
	    	date_default_timezone_set("Asia/jakarta");
	    	$date = date('Y-m-d');	
			$update = array(
				'username' => $request->username, 
				'name' => $request->name,
				'user_type' => $request->user_type,
				'gender' => $request->gender,
				'phone' => $request->phone,
                'card_id' => $request->card_id,
				'amount' => $request->amount,
				'updated_at' => $date
			);

			userModel::where('id_user',$id)->update($update);

	    	return back()->with('message','Data Berhasil Diupdate');
    }

	public function ownUpdate(Request $request){
    	date_default_timezone_set("Asia/jakarta");
    	$date = date('Y-m-d');	
    	$id = Session::get('id');
		$update = array(
			'username' => $request->username, 
			'name' => $request->name,
			'type' => $request->userType,
			'gender' => $request->gender,
			'tlp' => $request->tlp,
			'address' => $request->address,
			'city' => $request->city,
			'birth_date' => $request->birth_date,
			'company_name' => $request->company,
			'province' => $request->province,
			'postal_code' => $request->postal_code,
			'description' => $request->description,
			'updated_at' => $date
		);

		userModel::where('id_admin',$id)->update($update);

    	return back()->with('message','Data Berhasil Diupdate');
    }
}
