@extends('layouts.app')
@section('title')
    Student Hub
@endsection
@section('content')
	<form action="" method="POST" class="ui form" id="postform" enctype="multipart/form-data">{{ csrf_field() }}
		<div class="ui fluid card">
			<div class="content">
				<div class="header"></div>
				<div class="description">
					<div class="field">
						<textarea name="content" id="content" rows="3" autofocus></textarea>
					</div>
					<input type="hidden" name="comments_enabled" id="comments_enabled" value="{{ $settings['comments_enabled'] }}">
					<input type="hidden" name="user_type" id="user_type" value="{{ Auth::user()->user_group }}">
				</div>
			</div>
			<div class="extra content">
				<label for="image" class="ui left floated mini icon button">
		        	<i class="photo icon"></i>
			    </label>
			    <input type="file" id="image" name="image" style="display: none;">
				
				{!! Form::select('visibility_id', $visibilities->pluck('name', 'id'), $settings->default_visibility, ['class' => 'ui mini floating search dropdown', 'id' => 'visibility_id']) !!}
				<button type="submit" class="ui right floated mini primary submit icon button">Post <i class="send icon"></i></button>
			</div>
		</div>
	</form>
	<div class="ui hidden divider"> </div>
	<div id="posts-container">
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('plugins/axios/js/axios.min.js') }}"></script>
	{{-- <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script> --}}
	<script>	
		fetchPosts('all');

    	function fetchPosts(filter){
	      axios.get('{{ route('allPosts') }}', {
	        params:{
	          filter : filter
	        }
	      })
	      .then(response => $('#posts-container').html(response.data));
    	}

    	function loadPost(id){
		    axios.get('{{ route('getPost') }}', {
		        params:{
		          id : id
		        }
		    })
		    .then(response => $('#post-container').html(response.data));
	    }
		
		$('#postform').submit(function(e){
		    e.preventDefault();
	     	$.ajax({
	     		type: 'POST',
	     		url : '{{ route('addPost') }}',
	     		data : new FormData($('form')[0]),
	     		cache: false,
		        contentType: false,
		        processData: false,
	     		success: function(response){
	     			notify(response.message, 'success', 'info icon');
	      			$('#content').val('');
	      			fetchPosts('all');
	     		}
	     	});
	    });

	    // CKEDITOR.inline( 'content' );
	</script>

	{{-- <script src="{{ asset('js/main.js') }}"></script> --}}
@endsection
