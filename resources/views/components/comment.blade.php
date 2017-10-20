@foreach($comments as $comment)
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