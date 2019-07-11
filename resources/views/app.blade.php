@include('blocks.header')
<div id="content">
@yield('content')
</div>

@section('scriptDevMod')
@parent
@stop
@include('blocks.footer')