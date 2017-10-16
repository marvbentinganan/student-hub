{{--Profile and Left Navigation--}}
<div class="three wide column">
  	<div class="ui fluid secondary vertical menu">
		<div class="ui fluid card">
			<div class="image">
			  <img src="{{ asset('images/users/'.Auth::user()->profile['picture']) }}">
			</div>
			<div class="content">
			  	<a class="header">{{ Auth::user()->profile->firstname.' '.Auth::user()->profile->lastname }}</a>
				<div class="description">
					<p class="ui sub header">{{ ucwords(Auth::user()->user_group) }}</p>
				</div>
			</div>
		</div>
		@foreach($links as $link)
			<a href="{{ url($link->link) }}" class="item">{{ $link->name }}<i class="{{ $link->icon }} icon"></i></a>
		@endforeach
  	</div>
</div>
