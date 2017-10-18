<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use App\Models\Post;
use Carbon\Carbon;
use Redirect;
use Auth;

class PostController extends Controller
{
	public function store(Request $request){
		// dd($request->photo);
		$this->validate(request(), [
			'content' => 'required'
		]);

		$user = Auth::user();

		if($request->hasFile('image')){
			$name = md5_file($request->file('image')->getRealPath());
			$ext = $request->file('image')->guessExtension();
			$filename = Carbon::now().$name.'.'.$ext;
			$request->request->add(['photo' => $filename]);
			request()->file('image')->storeAs('posts', $filename, 'public');
		}
		$user->post()->create($request->all());
		return ['message' => 'Update Posted!'];
	}

	public function show($id){
		$global = GlobalSetting::first();
		$post = Post::find($id);
		return view('post', compact('post', 'global'));
	}

	public function posts(Request $request){
		if($request->filter === 'all'){
			$global = GlobalSetting::first();
			$posts = Post::latest()->get();
			return view('components.post-card', compact('posts', 'global'));
		}
	}

	public function getPost(Request $request){
		$post = Post::find($request->id);
		return view('components.ui-post', compact('post'));
	}
}
