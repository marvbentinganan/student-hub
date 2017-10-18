<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
<div class="uk-grid-collapse uk-child-width-1-2@s {{-- uk-flex-middle --}} uk-flex-center" uk-grid>
    <div class="uk-background-cover" style="background-image: url('{{ asset('storage/posts/'.$post['photo']) }}');" uk-height-viewport></div>
    <div class="uk-padding-large uk-overflow-auto">
        <h1>{{ $post->user['profile']['firstname'].' '.$post->user['profile']['lastname'] }}</h1>
        <p>{!! $post->content !!}</p>
        <div class="uk-overflow-auto">
        	@foreach($post->comments as $comment)
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
			@endforeach
			<form action="" @submit.prevent="onSubmit">
				<div class="uk-margin">
					<div class="uk-inline uk-width-1-1">
						<button type="submit" class="uk-form-icon uk-form-icon-flip" uk-icon="icon: plus-circle"></button>
						<input type="text" class="uk-input" placeholder="Comment...">
					</div>
    			</div>
			</form>
        </div>
    </div>
</div>

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
					.then(response => notify(response.data.message, 'success', 'info icon'), $('#content').val(''))
					.catch(error => this.errors.record(error.response.data));
			}
		}
	});
	</script>