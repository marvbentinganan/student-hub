<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountSetting;
use App\Models\MainNavigation;
use App\Models\GlobalSetting;
use App\Models\Visibility;
use App\Models\Role;
use Session;
use Auth;

class SettingController extends Controller
{
    public function userAccess(){
    	$roles = Role::select('name', 'id')->get();
    	$colors = [
    		'blue', 'red', 'green', 'yellow', 'teal', 'orange', 'pink', 'purple', 'violet', 'black', 'brown', 'gray'
    	];
    	return view('settings.user-access', compact('roles', 'colors'));
    }

    public function accountIndex(){
    	$visibilities = Visibility::select('id', 'name')->get();
    	$settings = AccountSetting::where('user_id', Auth::user()->id)->first();
    	return view('settings.account', compact('visibilities', 'settings'));
    }

    public function globalIndex(){
    	$visibilities = Visibility::select('id', 'name')->get();
    	$settings = GlobalSetting::first();
    	return view('settings.global', compact('visibilities', 'settings'));
    }

    public function globalUpdate(Request $request){
    	$setting = GlobalSetting::where('id', 1)->first();
		$setting->update([
			$request->filter => $request->toggle
		]);
    	
    }
}
