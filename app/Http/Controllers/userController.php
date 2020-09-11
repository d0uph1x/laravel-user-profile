<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class userController extends Controller
{
    public function uploadPix(Request $request){
    	if ($request->hasFile('avatar')){
    		$filename = time() . $request->avatar->getClientOriginalName();
    		$request->avatar->storeAs('profile_pix',$filename,'public');
    		auth()->user()->update(['avatar' => $filename]);
    	}
		return redirect()->back()->with('success','uploaded succesfully');
    }

    public function changePassword(){
    	return view('auth.passwords.change_pass');
    }

    public function changePass(Request $request){
    	if(!(Hash::check($request->get('current_pass'),Auth::user()->password))){
    		return back()->with('error','Password does not match your account');
    	}
    	elseif(strcmp($request->get('new_pass'),$request->get('confirm_new_pass')) != 0){
    		return back()->with('error','Password and Confirm Password fields dont match');
    	}
    	else{
   		User::find(auth()->user()->id)->update(['password' => Hash::make($request->get('new_pass'))]);
    	return back()->with('message','Password changed');
    	}

    }
}
