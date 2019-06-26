<?php $active = !empty($active)?$active:'';?>
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/static/mix.css')) }}" media="all,handheld"/>
@stop
@include('blocks.header')
<div id="content">
    <div class="static_container">
        <div class="static">
            <div class="static-wrap">
                <div class="static-menu">
                    <ul class="static-menu-item">
                        <li class="static-item {{$active=='aboutus'?' active':''}}">
                            <a href="{{ route('aboutus') }}">About us</a>
                        </li>
                        <li class="static-item {{$active=='contactus'?' active':''}}">
                            <a href="{{ route('contactus') }}">Contact us</a>
                        </li>
                        <li class="static-item {{$active=='privacy_policy'?' active':''}}">
                            <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
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

@include('blocks.footer')