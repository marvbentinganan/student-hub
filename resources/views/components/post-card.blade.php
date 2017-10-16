<div id="post-modal" class="uk-modal-full" uk-modal>
	    <div class="uk-modal-dialog" id="post-container">
	        
	    </div>
	</div>
@foreach($posts as $post)
	<a class="ui fluid card" id="app" {{-- href="{{ url('posts/'.$post->id.'/view') }}" --}} href="#post-modal" onclick="loadPost({{ $post->id }})" uk-toggle>
		<div class="image">
			<img src="{{ asset('storage/posts/'.$post['photo']) }}">
		</div>
		<div class="content">
			<div class="header">
				<img class="ui avatar image" src="{{ asset('images/users/'.$post->user['profile']['picture']) }}">
				{{ $post->user['profile']['firstname'].' '.$post->user['profile']['lastname'] }}
			</div>
			<div class="meta">
				<span class="date">{{ $post->created_at->diffForHumans() }}</span>
			</div>
			<div class="description">{!! $post->content !!}</div>
		</div>
		<div class="extra content">
			{{-- @if($post->comments_enabled == true AND $global->comments_enabled == true)
			<form action="" class="ui form" @submit.prevent="onSubmit">
				<div class="ui fluid action input">
					<input type="hidden" name="user_id" v-model="user_id" value="{{ auth()->id() }}">
				  	<input type="text" name="content" v-model="content" placeholder="Comment...">
				  	<button class="ui icon button">
				    	<i class="send icon"></i>
				  	</button>
				  	<span class="ui warning message" v-text="errors.get('content')"></span>
				</div>
			</form>
			<a href="" class=""><i class="comment icon"></i> {{ count($post->comments) }}</a>
			@else
			<div class="ui mini warning message">
				Comments disabled for this post
			</div>
			@endif --}}
			<div class="meta">
				@if(count($post->comments) <= 1)
					<span class="date"><i class="comment icon"></i> {{ count($post->comments) }} Comment</span> 
				@else
					<span class="date"><i class="comment icon"></i> {{ count($post->comments) }} Comments</span>
				@endif
			</div>
		</div>
	</a>
@endforeach
