<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" id="favicon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lobibox/css/lobibox.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>

</head>
<body>
    <nav class="ui blue inverted top fixed borderless large menu">
        <a href="{{ url('/timeline') }}" class="header item"  id="sideshow"><i class="ion-android-home icon"></i>STUDENT HUB</a>
        <div class="right menu">
            <div class="ui dropdown link item">
                    {{ Auth::user()->profile->firstname }}
                    <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item" id="logout"><i class="sign out icon"></i>Logout</div>
                </div>
            </div>
        </div>
    </nav>
    <div class="ui grid ">
        <div class="sixteen wide column">
            <div class="ui three column padded grid">
                <div class="three wide column computer only">
                   
                </div>
                <div class="centered thirteen wide column">
                    <div class="ui hidden divider"></div>
                    @yield('content')  
                </div>
            </div>
            @include('components.notify')
        </div>
    </div>

    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="inverted red circular question icon"></i>
            CONFIRMATION
        </div>
        <div class="content">
            <p>Are you sure you want to Logout of the System?</p>
        </div>
        <div class="actions">
            <form action="{{ route('logout') }}" method="POST" style="display: hidden;">
                {{ csrf_field() }}
                <div class="ui red basic cancel inverted button"><i class="remove icon"></i>No</div>
                <button type="submit" class="ui green ok inverted button"><i class="checkmark icon"></i>Yes</button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script>
        $('#logout').click(function(){
            $('.ui.basic.modal').modal('show');
        });
        $('.dropdown').dropdown();
    </script>
    @yield('scripts')
</body>
</html>
