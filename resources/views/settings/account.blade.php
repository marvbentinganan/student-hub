@extends('layouts.app')
@section('title')
	Account Settings
@endsection

@section('content')
	<div class="ui segment">
		<div class="ui centered header">Account Settings</div>
		<form action="" class="ui mini form">
			<div class="fields">
				<div class="twelve wide field">
					<h5>Enable other users to add comments on your posts.</h5>
				</div>
				<div class="four wide field">
					<div class="ui toggle checkbox">
					@if($settings['comments_enabled'] == true)
				      	<input type="checkbox" name="comments_enabled" id="comments_enabled" value="true" class="hidden" checked>
				      	<label for="comments_enabled">Enable</label>
				    @else
						<input type="checkbox" name="comments_enabled" id="comments_enabled" value="true" class="hidden">
				      	<label for="comments_enabled">Enable</label>
				    @endif
				    </div>
				   
				</div>
			</div>
			<div class="fields">
				<div class="twelve wide field">
					<h5>Set the default audience of your posts.</h5>
				</div>
				<div class="four wide field">
					{!! Form::select('default_visibility', $visibilities->pluck('name', 'id'), $settings['default_visibility'], ['class' => 'ui fluid search dropdown']) !!}
				</div>
			</div>
			<div class="field">
				<button type="submit" class="ui mini primary submit icon button"><i class="ion-checkmark-circled icon"></i> Update Settings</button>
			</div>
		</form>
	</div>
@endsection