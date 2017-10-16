<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request){
    	
    	$this->validate(request(), [
			'content' => 'required'
		]);

    	$post = Post::find($request->post_id);
    	$post->comments()->create([
    		'user_id' => $request->user_id,
    		'content' => $request->content
    	]);

    	return ['message' => 'Comment Added'];
    }
}
