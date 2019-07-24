@include('blogs.blocks.header')
<div id="content">
    @yield('content')
</div>

@section('scriptDevMod')
    @parent
@stop
@include('blogs.blocks.footer')