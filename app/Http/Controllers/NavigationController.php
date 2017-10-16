<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainNavigation;
use Redirect;

class NavigationController extends Controller
{
    public function store(Request $request){
    	$link = MainNavigation::create($request->all());
    	$link->roles()->attach($request->role);
    	return Redirect::back();
    }
}
