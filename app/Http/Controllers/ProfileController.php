<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class ProfileController extends Controller
{
    public function index(){
    	return view('profile.index');
    }
}
