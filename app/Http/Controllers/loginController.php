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
    			Session::put('user_type',$this->role[$user->user_type-1]);
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

    public function changePassword(Request $request){
        $old = userModel::where('id_user',Session::get('id'))->first();
        if(!Hash::check($request->oldpw,$old->password)){
            return back()->with('alert','Password lama salah');
        }
        if($request->pw!=$request->pw2){
            return back()->with('alert','Password Baru dan Konfirmasi tidak sama');
        }
        if(strlen($request->pw)<8){
            return back()->with('alert','Password minimal 8 karakter'); 
        }
        $update = array('password' => Hash::make($request->pw) );
        userModel::where('id_user',Session::get('id'))->update($update);
        return back()->with('message','Password Berhasil Diubah');
    }

    public function resetPassword($id){
        date_default_timezone_set("Asia/jakarta");
        
        $update = array('password' => Hash::make('N3wPassword'.$id) );
        userModel::where('id_user',$id)->update($update);
        return back()->with('message','Password Berhasil direset, Login dengan password <strong>N3wPassword'.$id.'</strong>');
    }
}
