@section('css')
    @parent
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
@stop
    @include('blogs.elements.head')
{!! '</head><body>' !!}
    <header class="header">
        <div class="container header-wrap">
            <div class="header-logo">
                <img src="https://www.hotdeals.com/blog/wp-content/uploads/2018/07/cropped-HD-LOGO.png" alt="logo" width="412" height="135" sizes="(max-width: 412px) 100vw, 412px" />
            </div>
            <div class="button-menu">
                <button data-target="#site-nav" data-toggle="nav-top" onclick="$('.nav-top').toggle(500);" class="btn btn-default">
                    <i class="glyphicon glyphicon-align-justify"></i>
                </button>
            </div>
            <nav class="nav-top" id="site-nav">
                <ul class="nav nav-pills nav-background">
                    <li role="presentation"><a href="#">COUPONS</a></li>
                    <li role="presentation"><a href="#">ALL POST</a></li>
                    <li role="presentation"><a href="#">SAVING TIPS</a></li>
                    <li role="presentation"><a href="#">STORE HACKS</a></li>
                    <li role="presentation"><a href="#">PROMOTION</a></li>
                    <li role="presentation"><a href="#">HEALTH & BEAUTY</a></li>
                    <li role="presentation"><a href="#">TRAVEL</a></li>
                </ul>
            </nav>
        </div>
    </header>