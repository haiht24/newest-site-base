


@include('blocks.elements.foot')
@yield('script')
@if(config('config.devmod'))
    @yield('scriptDevMod')
@else
    @yield('scriptMix')
@endif
@yield('addfooter')


@if(!empty($_GET['c']))
    {{--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
    <div class="store-modal">
        <div class="modal fade" id="myModal" role="dialog">
        </div>
    </div>

<link rel="stylesheet" type="text/css" href="{{ asset('/css/modals.min.css') }}" />
    <script>
        var c_url = '{{ route('coupon-detail', [ 'goId'=>$_GET['c'] ]) }}';
        $.get(c_url, function(data) {
            $('#myModal').html(data);
            $('#myModal').modal('show');
            detectCopy();
            $('.coupon-related .location').click(function(){ openGoEv(this); });
        });
    </script>
@endif
<div class="link-to-top"><i class="glyphicon glyphicon-arrow-up"></i></div>
{!! '</body></html>' !!}