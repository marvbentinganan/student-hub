@extends('layouts.master')
@section('title')
	Student Hub | User Management
@endsection
@section('content')
	<div class="row">
		<div class="column">
			<div class="ui top attached header">
			<i class="ion-ios-people icon"></i>
				<div class="content">
					Manually Add New User
				</div>
			</div>
			<form action="" class="ui attached form segment" id="newUserForm">
				{{ csrf_field() }}
				<div class="three fields">
					<div class="field">
						<div class="ui left icon input">
							<input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" placeholder="Firstname">
							<i class="ion-card icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="text" name="middlename" id="middlename" value="{{ old('middlename') }}" placeholder="Middlename">
							<i class="ion-card icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="Lastname">
							<i class="ion-card icon"></i>
						</div>
					</div>
				</div>
				<div class="four fields">
					<div class="field">
						<div class="ui left icon input">
							<input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="User ID">
							<i class="ion-card icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
							<i class="ion-email icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui calendar" id="dob">
							<div class="ui left icon input">
								<input type="text" id="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date of Birth">
								<i class="calendar icon"></i>
							</div>
						</div>
					</div>
					<div class="field">
						<div class="ui selection dropdown">
						  	<input type="hidden" name="gender" value="{{ old('gender') }}" id="gender">
						  	<i class="dropdown icon"></i>
						  	<div class="default text">Gender</div>
						  	<div class="menu">
						    	<div class="item" data-value="male">Male</div>
						    	<div class="item" data-value="female">Female</div>
						  	</div>
						</div>
					</div>
				</div>
				<div class="four fields">
					<div class="field">
						<div class="ui selection dropdown">
						  	<input type="hidden" name="user_type" value="{{ old('user_type') }}" id="user_type">
						  	<i class="dropdown icon"></i>
						  	<div class="default text">User Type</div>
						  	<div class="menu">
						    	<div class="item" data-value="super">Super</div>
						    	<div class="item" data-value="admin">Admin</div>
						    	<div class="item" data-value="student">Student</div>
						  	</div>
						</div>
					</div>
					<div class="field">
						<div class="ui selection dropdown">
						  	<input type="hidden" name="user_group" value="{{ old('user_group') }}" id="user_group">
						  	<i class="dropdown icon"></i>
						  	<div class="default text">User Group</div>
						  	<div class="menu">
						    	<div class="item" data-value="admin">Admin</div>
						    	<div class="item" data-value="college">College</div>
						    	<div class="item" data-value="senior-high">Senior High</div>
						  	</div>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="password" name="password" placeholder="Password">
							<i class="ion-key icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="password" name="confirmation" placeholder="Confirm Password">
							<i class="ion-key icon"></i>
						</div>
					</div>
				</div>
				<div class="ui success message">
				    <div class="header">Data Validated</div>
				    <p>Adding new user</p>
  				</div>
  				<div class="ui error message">
				    <div class="header">Submission Failed</div>
				    <p>Unable to add New User</p>
				</div>
				<div class="field">
					<button type="submit" class="ui primary submit icon button"><i class="add user icon"></i> Add User</button>
				</div>
			</form>
		</div>
	</div>
	<div class="ui hidden divider"></div>
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
				<div class="field">
					<div class="ui input">
						<input type="file" name="file" id="">
					</div>
				</div>
				<div class="field">
					<button type="submit" class="ui fluid primary submit icon button"><i class="ion-ios-upload icon"></i> Upload</button>
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
			</form>
		</div>

	</div>
@endsection
@section('scripts')
<script src="{{ asset('js/calendar.min.js') }}"></script>
<script>
  $('#newUserForm').form({
    fields:{
      firstname:{
        identifier: 'firstname',
        rules:[{
          type: 'empty',
          prompt: 'Firstname is required'
        }]
      },
      lastname:{
        identifier: 'lastname',
        rules:[{
          type: 'empty',
          prompt: 'Lastname is required'
        }]
      },
      username:{
        identifier: 'username',
        rules:[{
          type: 'empty',
          prompt: 'Please enter user ID Number'
        }]
      },
      email:{
        identifier: 'email',
        rules:[{
          type: 'email',
          prompt: 'Please enter valid Email Address'
        }]
      },
      password:{
        identifier: 'password',
        rules:[{
          type: 'minLength[6]',
        }]
      },
      confirmation:{
        identifier: 'confirmation',
        rules:[{
          type: 'match[password]',
          prompt: 'Passwords do not match'
        }]
      },
      date_of_birth:{
        identifier: 'date_of_birth',
        rules:[{
          type: 'empty',
          prompt: 'Please enter date of birth'
        }]
      },
      gender:{
        identifier: 'gender',
        rules:[{
          type: 'empty',
        }]
      },
      user_type:{
        identifier: 'user_type',
        rules:[{
          type: 'empty',
        }]
      },
      user_group:{
        identifier: 'user_group',
        rules:[{
          type: 'empty',
        }]
      },
    },
    inline : true,
    on     : 'blur'
  });
  $('#dob').calendar({
    type: 'date'
  });

  $('#newUserForm').submit(function(e){
  	e.preventDefault();
  	var data = $('#newUserForm').serialize();
  	$.ajax({
		type: 'POST',
		url : '{{ route('addNewUser') }}',
		data : data,
		cache: false,
		success: function(response){
			notify(response.message, 'success', 'info icon');
			$('#newUserForm').clear();
		},
		error: function(response){
			notify('Failed to add new user', 'error', 'remove icon');
		}
	});
  });
  
  </script>
@endsection