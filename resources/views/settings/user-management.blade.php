@extends('layouts.master')
@section('title')
	Student Hub | User Management
@endsection
@section('content')
	<div class="ui two column grid">
		<div class="column">
			<div class="ui top attached header">
			<i class="ion-ios-people icon"></i>
				<div class="content">
					Upload College Students Data
				</div>
			</div>
			<form action="{{ route('uploadUsers') }}" method="POST" class="ui attached form segment" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="ui mini info icon message">
					<i class="ion-alert icon"></i>
					<div class="content">
						<div class="header">Note:</div>
						<p>A generated report from the EasyEnroll system is required in order to add student credentials.</p>
					</div>
				</div>
				<div class="fields">
					<div class="twelve wide field">
						<div class="ui input">
							<input type="file" name="file" id="">
						</div>
					</div>
					<div class="four wide field">
						<button type="submit" class="ui fluid primary submit icon button"><i class="ion-ios-upload icon"></i> Upload</button>
					</div>
				</div>
			</form>
		</div>
		<div class="column">
			<div class="ui top attached header">
			<i class="ion-ios-people icon"></i>
				<div class="content">
					Migrate Senior High School Students Data
				</div>
			</div>
			<form action="{{ route('migrateSHS') }}" method="POST" class="ui attached form segment">
				{{ csrf_field() }}
				<input type="hidden" name="confirmation" value="true">
				<div class="ui mini info icon message">
					<i class="ion-alert icon"></i>
					<div class="content">
						<div class="header">Note:</div>
						<p>User accounts for Senior High School Students will be migrated from their Online Module.</p>
					</div>
				</div>
				<div class="field">
					<button type="submit" class="ui fluid primary submit icon button"><i class="ion-ios-arrow-thin-right icon"></i> Migrate Data</button>
				</div>
			</div>
		</form>
	</div>
@endsection