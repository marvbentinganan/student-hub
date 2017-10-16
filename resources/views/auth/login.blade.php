@extends('layouts.auth')
@section('title')
    Login | Student Hub
@endsection
@section('content')
    <div class="ui segment">
        <div class="ui huge blue header">Student Hub
            <div class="ui sub header">Riverside College Incorporated</div>
        </div>
        <form action="" method="POST" class="ui form">
            {{ csrf_field() }}
            <div class="field">
                <div class="ui left icon input">
                    <input type="text" name="username" placeholder="Student ID" autofocus>
                    <i class="ion-ios-contact icon"></i>
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <input type="password" name="password" placeholder="Password">
                    <i class="io-ios lock icon"></i>
                </div>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Keep Me Logged In</label>
                </div>
            </div>
            <div class="field">
                <button type="submit" class="ui fluid primary submit icon button"><i class="ion-ios-play icon"></i> Sign In</button>
            </div>
        </form>
        <div class="ui hidden divider"></div>
        Forgot Your Password? <a href="#">Click here</a>
    </div>
@endsection
