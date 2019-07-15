


@include('elements.foot')
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
@yield('script')
@if(config('config.devmod'))
    @yield('scriptDevMod')
@else
    @yield('scriptMix')
@endif
@yield('addfooter')
{!! '</body></html>' !!}