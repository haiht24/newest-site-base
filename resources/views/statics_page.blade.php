<?php $active = !empty($active)?$active:'';?>
@section('cssDevMod')
@parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/src/libs/bootstrap.3.3.7.min.css') }}" media="all,handheld"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/static_page.min.css') }}" media="all,handheld"/>
@stop
@section('cssMix')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/mix-static.css')) }}" media="all,handheld"/>
@stop
@include('blocks.header')
<div id="content">
    <div class="static_container">
        <div class="static">
            <div class="static-wrap">
                <div class="static-menu">
                    <ul class="static-menu-item">
                        <li class="static-item {{$active=='aboutus'?' active':''}}">
                            <a href="{{ route('aboutus') }}" title="about us">About us</a>
                        </li>
                        <li class="static-item {{$active=='contactus'?' active':''}}">
                            <a href="{{ route('contactus') }}" title="contact us">Contact us</a>
                        </li>
                        <li class="static-item {{$active=='privacy_policy'?' active':''}}">
                            <a href="{{ route('privacy_policy') }}" title="privacy policy">Privacy Policy</a>
                        </li>
                        <li class="static-item {{$active=='terms'?' active':''}}">
                            <a href="{{ route('termsPage') }}" title="term and conditions">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>

                <div class="static-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

@section('scriptDevMod')
@parent
	<script src="{{ asset('/js/all/mix-libs.js') }}"></script>
	<script src="{{ asset('/js/app-footer.min.js') }}"></script>
@stop
@include('blocks.footer')