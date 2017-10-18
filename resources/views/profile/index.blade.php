@extends('layouts.uikit')
@section('title')
	{{ Auth::user()->profile['firstname'].' '.Auth::user()->profile['lastname'] }}
@endsection

@section('content')
	<div class="uk-grid">
		{{-- Cover Photo and Profile Picture --}}
		<div class="uk-width-1-1 uk-background-cover uk-height-medium uk-flex uk-flex-center uk-flex-middle" style="background-image: url({{ asset('images/covers/default.jpg') }});">
			<div class="uk-card-small uk-text-center">
	            <div class="uk-card-media-top">
	                <img src="{{ asset('images/users/'.Auth::user()->profile->picture) }}" alt="" width="150" height="150" class="uk-border-circle">
	            </div>
	            <div class="uk-card-body">
	                <h3 class="uk-card-title uk-text-primary">{{ Auth::user()->profile['firstname'].' '.Auth::user()->profile['lastname'] }}</h3>
	            </div>
	        </div>
		</div>
		{{-- Navbar --}}
		<div class="uk-width-1-1">
			<div class="uk-navbar-container tm-navbar-container uk-sticky" uk-sticky="media: 960">
				<div class="uk-container uk-container-expand uk-section-primary" uk-navbar>
					<div class="uk-navbar-center">
						<ul class="uk-navbar-nav">
							<li>
								<a href="{{ url('timeline') }}"><span class="uk-icon uk-margin-small-right" uk-icon="icon: list"></span> Timeline</a>
							</li>
							<li>
								<a href="{{ url('message') }}"><span class="uk-icon uk-margin-small-right" uk-icon="icon: mail"></span> Messages</a>
							</li>
							<li>
								<a href="{{ url('account-settings') }}"><span class="uk-icon uk-margin-small-right" uk-icon="icon: settings"></span> Account Settings</a>
							</li>
				    	</ul>
					</div>
				</div>
			</div>
		</div>
		{{-- Posts --}}
		<div class="uk-width-1-5"></div>
		<div class="uk-width-3-5">
			<br>
			<form action="">
				<div class="uk-margin uk-width-1-1">
        			<textarea class="uk-textarea" name="content" id="content" placeholder="What's on your mind?"></textarea>
    			</div>
    			<div class="uk-margin">
    				<div class="uk-grid-small">
    					<div uk-form-custom>
				            <input type="file">
				            <button class="uk-button-primary uk-icon-button" type="button" tabindex="-1" uk-icon="icon: camera"></button>
			        	</div>
			        	<div uk-form-custom="target: > * > span:first">
				            <select>
				                <option value="{{ Auth::user()->account_settings['default_visibility'] }}" selected="">{{ Auth::user()->account_setting['visibility']['name'] }}</option>
				                @foreach($visibilities as $audience)
				                	<option value="{{ $audience->id }}">{{ $audience->name }}</option>
				                @endforeach
				            </select>
				            <button class="uk-button uk-button-default" type="button" tabindex="-1">
				                <span></span>
				                <span uk-icon="icon: chevron-down"></span>
				            </button>
				        </div>
    				</div>
			    </div>
			</form>
			<div id="post-modal" class="uk-modal-full" uk-modal>
			    <div class="uk-modal-dialog" id="post-container">
			        
			    </div>
			</div>
			{{-- Posts --}}
			<hr class="uk-divider-icon">
			@foreach(Auth::user()->post as $post)
				<div class="uk-card uk-card-default uk-card-hover">
		            <a href="#post-modal" class="uk-card-media-top" onclick="loadPost({{ $post->id }})" uk-toggle>
		                <img src="{{ asset('storage/posts/'.$post['photo']) }}" alt="">
		            </a>
		            <div class="uk-card-body">
		            	<div class="uk-grid-small uk-flex-middle" uk-grid>
				            <div class="uk-width-auto">
				                <img class="uk-border-circle" width="40" height="40" src="{{ asset('images/users/'.$post->user['profile']['picture']) }}">
				            </div>
				            <div class="uk-width-expand">
				                <h3 class="uk-card-title uk-margin-remove-bottom">{{ $post->user['profile']['firstname'].' '.$post->user['profile']['lastname'] }}</h3>
				                <p class="uk-text-meta uk-margin-remove-top"><time datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time></p>
				            </div>
				        </div>
		                <p>{!! $post->content !!}</p>
		            </div>
		            <div class="uk-card-footer">
		            	@if( count($post->comments) <= 1 )
							<a href="#post-modal" class="uk-icon-link" onclick="loadPost({{ $post->id }})" uk-toggle><span class="uk-margin-small-right" uk-icon="icon: comment"></span> {{ count($post->comments) }} Comment</a>
		            	@else
							<a href="#post-modal" class="uk-icon-link" onclick="loadPost({{ $post->id }})" uk-toggle><span class="uk-margin-small-right" uk-icon="icon: comments"></span> {{ count($post->comments) }} Comments</a>
		            	@endif
    				</div>
		           {{--  @foreach($post->comments as $comment)
					<article class="uk-comment uk-comment-primary">
					    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
					        <div class="uk-width-auto">
					            <img class="uk-comment-avatar uk-border-circle" src="{{ asset('images/users/'.$comment->user['profile']['picture']) }}" width="40" height="40" alt="">
					        </div>
					        <div class="uk-width-expand">
					            <h4 class="uk-comment-title uk-margin-remove uk-text-small"><a class="uk-link-reset" href="#">{{ $comment->user['profile']['firstname'].' '.$comment->user['profile']['lastname'] }}</a></h4>
					            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top uk-text-small">
					                <li><a href="#">{{ $comment->created_at->diffForHumans() }}</a></li>
					            </ul>
					        </div>
					    </header>
					    <div class="uk-comment-body uk-text-meta">
					        <p>{{ $comment->content }}</p>
					    </div>
					</article>
		            @endforeach --}}
		        </div>
		        <hr class="uk-divider-icon">
			@endforeach
		</div>
		<div class="uk-width-1-5"></div>
	</div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/axios/js/axios.min.js') }}"></script>
<script>
	function loadPost(id){
	    axios.get('{{ route('getPost') }}', {
	        params:{
	          id : id
	        }
	    })
	    .then(response => $('#post-container').html(response.data));
    }
</script>
	{{-- <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
		  	selector: 'textarea',
		  	height: 100,
		  	menubar: false,
		  	plugins: [
		    'advlist autolink lists link image charmap print preview anchor textcolor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code help'
		  	],
		  	toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
		  	content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css']
		});
	</script> --}}
@endsection