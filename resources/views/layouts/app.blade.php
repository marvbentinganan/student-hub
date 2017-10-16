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
    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lobibox/css/lobibox.css') }}"  />
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
</head>
<body>
    <nav class="ui blue inverted top fixed borderless large menu">
        <a class="header item"  id="sideshow"><i class="ion-android-home icon"></i>STUDENT HUB</a>
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
    <div class="ui grid container">
        <div class="ui hidden divider"></div>
        <div class="sixteen wide column" style="height:100%; !important">
            <div class="ui stackable three column grid">
                @include('partials.left-nav')
                <div class="ten wide column">
                    @yield('content')    
                </div>
                @include('partials.right-nav')
            </div>
        </div>
    </div>
    @include('components.notify')
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
