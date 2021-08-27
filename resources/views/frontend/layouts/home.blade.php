<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<link href="<?php echo asset('assets/addchat/css/addchat.min.css') ?>" rel="stylesheet">
    @include('frontend.includes.head')
</head>
<body class="{{ str_replace('.','-',Route::currentRouteName()) }} theme-{{ config('settings.theme') }}">
    @includeWhen(config('settings.gtm_container_id'), 'frontend.includes.gtm-body')

    <div id="app">

        @yield('content')

        @includeFirst(['frontend.includes.footer-udf','frontend.includes.footer'])


<div id="addchat_app" 
    data-baseurl="<?php echo url('') ?>"
    data-csrfname="<?php echo 'X-CSRF-Token' ?>"
    data-csrftoken="<?php echo csrf_token() ?>"
></div>
    </div>

    @include('frontend.includes.scripts')


    <script type="module" src="<?php echo asset('assets/addchat/js/addchat.min.js') ?>"></script>
    <!-- Fallback support for Older browsers -->
    <script nomodule src="<?php echo asset('assets/addchat/js/addchat-legacy.min.js') ?>"></script>

</body>
</html>