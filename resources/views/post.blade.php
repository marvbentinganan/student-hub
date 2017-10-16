@extends('layouts.app')
@section('title')
    Student Hub
@endsection

@section('content')
	<div class="ui fluid card" id="app">
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

			@if($post->comments_enabled == true AND $global->comments_enabled == true)
			<div class="ui comments">
				@foreach($post->comments as $comment)
					<div class="comment">
						<a href="" class="avatar">
							<img src="{{ asset('images/users/'.$comment->user['profile']['picture']) }}" alt="">
						</a>
						<div class="content">
							<a href="" class="author">{{ $comment->user['profile']['firstname'].' '.$comment->user['profile']['lastname'] }}</a>
							<div class="metadata">
								<span class="date">{{ $comment->created_at->diffForHumans() }}</span>
							</div>
							<div class="text">
								{{ $comment->content }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<form action="" class="ui form" @submit.prevent="onSubmit">
				<div class="ui fluid action input">
				  	<input type="text" name="content" v-model="content" placeholder="Comment...">
				  	<button class="ui icon button">
				    	<i class="send icon"></i>
				  	</button>
				  	{{-- <span class="ui warning message" v-text="errors.get('content')"></span> --}}
				</div>
			</form>
			@else
			<div class="ui mini warning message">
				Comments disabled for this post
			</div>
			@endif
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('plugins/axios/js/axios.min.js') }}"></script>
	<script src="{{ asset('js/vue.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script>
		new Vue({
		el: '#app',
		data: {
			content: '',
			user_id: '{{ auth()->id() }}',
			post_id: '{{ $post->id }}',
			errors : new Errors()
		},

		methods: {
			onSubmit(){
				axios.post('{{ route('addComment') }}', this.$data)
					.then(response => notify(response.data.message, 'success', 'info icon'), $('content').val(''))
					.catch(error => this.errors.record(error.response.data));
			}
		}
	});
	</script>
@endsection
