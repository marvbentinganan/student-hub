@extends('layouts.app')
@section('title')
	Global Settings
@endsection
@section('content')
	<div class="ui segment">
		<div class="ui centered header">Global Settings</div>
		<form action="" method="POST" class="ui mini form">
			{{ csrf_field() }}
			<div class="fields">
				<div class="twelve wide field">
					<h5>Allow users to add posts.</h5>
				</div>
				<div class="four wide field">
					<div class="ui toggle checkbox">
					@if($settings->posts_enabled == false)
					    <input type="checkbox" name="posts_enabled" id="posts_enabled" class="hidden" onchange="updateGlobal('posts_enabled', true)">
				    @else
						<input type="checkbox" name="posts_enabled" id="posts_enabled" class="hidden" onchange="updateGlobal('posts_enabled', false)" checked>
				    @endif
				    <label for="posts_enabled">Enable</label>
				    </div>
				</div>
			</div>
			<div class="fields">
				<div class="twelve wide field">
					<h5>Allow users to add comments to posts.</h5>
				</div>
				<div class="four wide field">
					<div class="ui toggle checkbox">
						@if($settings->comments_enabled == false)
					      	<input type="checkbox" name="comments_enabled" id="comments_enabled" class="hidden" onchange="updateGlobal('comments_enabled', true)">
					    @else
							<input type="checkbox" name="comments_enabled" id="comments_enabled" class="hidden" onchange="updateGlobal('comments_enabled', false)" checked>
					    @endif
				      	<label for="comments_enabled">Enable</label>
				    </div>
				</div>
			</div>

			<div class="fields">
				<div class="twelve wide field">
					<h5>Turn on post moderation.</h5>
				</div>
				<div class="four wide field">
					<div class="ui toggle checkbox">
						@if($settings->post_moderation == false)
				      		<input type="checkbox" name="post_moderation" id="post_moderation" class="hidden" onchange="updateGlobal('post_moderation', true)">
				      	@else
							<input type="checkbox" name="post_moderation" id="post_moderation" class="hidden" onchange="updateGlobal('post_moderation', false)" checked>
				      	@endif
				      	<label for="post_moderation">Enable</label>
				    </div>
				</div>
			</div>

			<div class="fields">
				<div class="twelve wide field">
					<h5>Allow user access to all module features.</h5>
				</div>
				<div class="four wide field">
					<div class="ui toggle checkbox">
						@if($settings->user_access == false)
				      		<input type="checkbox" name="user_access" id="user_access" class="hidden" onchange="updateGlobal('user_access', true)">
				      	@else
							<input type="checkbox" name="user_access" id="user_access" class="hidden" onchange="updateGlobal('user_access', false)" checked>
				      	@endif
				      <label for="user_access">Enable</label>
				    </div>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('plugins/axios/js/axios.min.js') }}"></script>
	<script>
		function updateGlobal(filter, toggle){
	      axios.post('{{ route('globalUpdate') }}',{
	        	filter : filter,
	          	toggle : toggle
	      })
	      .then(response => notify('Global Settings Updated', 'success', 'info icon'));
	    };
	</script>
@endsection