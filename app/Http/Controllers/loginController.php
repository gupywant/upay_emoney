<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Model\userModel;
use Illuminate\Support\Facades\Validator;
use Session;

class loginController extends Controller
{

	private $role = ['Admin', 'Penjual', 'Siswa'];

    public function index(){
    	return view('login');
    }

    public function login(Request $request){
    	$user = userModel::where('username',$request->username)->first();
    	if(!empty($user)){
    		if(Hash::check($request->password,$user->password)){
    			Session::put('loged',true);
    			Session::put('user_type',$user->user_type);
    			Session::put('username',$request->username);
                Session::put('id',$user->id_user);
    			return redirect(route('dashboard'));
    		}else{
    			return back()->with('alert','Username atau password salah');
    		}
    	}else{
    		return back()->with('alert','Username atau password salah');
    	}
    }

    public function logout(){
        Session::flush();
        return redirect(route('login'))->with('message','Logout Berhasil');
    }
}
