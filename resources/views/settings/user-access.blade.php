@extends('layouts.master')
@section('title')
	Student Hub | User Access
@endsection

@section('content')
	<div class="ui top attached header">
	<i class="ion-navicon-round icon"></i>
		<div class="content">
			Main Navigation ang User Access
		</div>
	</div>
	<form action="{{ route('addNav') }}" method="POST" class="ui attached form segment">
		{{ csrf_field() }}
		<div class="three fields">
			<div class="field">
				<label for="">Name</label>
				<div class="ui left icon input">
					<input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
					<i class="ion-compose icon"></i>
				</div>
			</div>
			<div class="field">
				<label for="">Link</label>
				<div class="ui left icon input">
					<input type="text" name="link" value="{{ old('link') }}" placeholder="URL">
					<i class="ion-at icon"></i>
				</div>
			</div>
			<div class="field">
				<label for="">Link Ordering (Optional)</label>
				<div class="ui left icon input">
					<input type="number" name="order" value="{{ old('order') }}" placeholder="Order">
					<i class="ion-shuffle icon"></i>
				</div>
			</div>
		</div>
		<div class="three fields">
			<div class="field">
				<label for="">User Role</label>
				{!! Form::select('role[]', $roles->pluck('name', 'id')->toArray(), null, ['class' => 'ui fluid search dropdown', 'multiple' => 'multiple']) !!}
			</div>
			<div class="field">
				<label for="color">Color (Optional)</label>
				<select name="color" id="color" class="ui fluid seach dropdown">
					<option value="">Default</option>
					@foreach($colors as $color)
						<option value="{{ $color }}">{{ ucwords($color) }}</option>
					@endforeach
				</select>
			</div>
			<div class="field">
				<label for="">Icon</label>
				<div class="ui left icon input">
					<input type="text" name="icon" value="{{ old('icon') }}" placeholder="Icon">
					<i class="ion-ionic icon"></i>
				</div>
			</div>
		</div>
		<div class="ui info icon message">
			<i class="ion-alert icon"></i>
			<div class="content">
				<div class="header">For a full list of supported icons, please visit the following links:</div>
				<li>The official <a target="_blank" href="https://semantic-ui.com/elements/icon.html">Semantic UI</a> icons</li>
				<li><a target="_blank" href="http://ionicons.com/">Ionicons</a> by <a target="_blank" href="https://twitter.com/benjsperry">{!! @benjsperry !!}</a></li>
			</div>
		</div>
		<div class="field">
			<button type="submit" class="ui primary submit icon button">
				<i class="add icon"></i> Add New Navigation
			</button>
		</div>
	</form>
	
@endsection