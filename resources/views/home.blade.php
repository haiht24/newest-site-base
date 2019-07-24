@section('cssDevMod')
@parent
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/src/libs/bootstrap.3.3.7.min.css') }}" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.min.css') }}" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/src/owl/owl.carousel.min.css') }}" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/src/owl/owl.theme.default.min.css') }}" media="all,handheld"/>
@stop
@section('cssMix')
@parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/mix-home.css')) }}" media="all,handheld"/>
@stop

@section('head')
@parent
<link rel="canonical" href="{{ url('/') }}">
<link rel="alternate" hreflang="en" type="application/rss+xml" href="{{ url('/feed/stores') }}" title="Feed: Stores">
<link rel="alternate" hreflang="en" type="application/rss+xml" href="{{ url('/feed/coupons') }}" title="Feed: Coupons">
@stop
@extends('app')

@section('content')
    @parent
    <div class="banner_wrapper" style="margin-top:3px">
        <div id="Glide" class="glide glide--carousel">
            <div class="glide__arrows">
                <span class="glide__arrow prev" data-glide-dir="<"></span>
                <span class="glide__arrow next" data-glide-dir=">"></span>
            </div>
            <ul class="glide__wrapper">
                @include('elements.slider-banner-glide')
            </ul>
            <ul class="glide__bullets"></ul>
        </div>
    </div>
{{--owl slider--}}
 <div class="first-slider first-owl">
     <h1>Highly Recommended Promo Codes & Coupons</h1>
     <!-- owl slider -->
     <div class="owl-carousel">
         {{-- start item --}}
            @include('elements.slider-owl')
         {{-- end item --}}
     </div>
     <div class="owl-pagation"></div>
 </div>

{{-- Top coupons --}}
<div class="top-coupons">
    <div class="coupons-title-top">
        <h1>Today's Top Coupons</h1>
    </div>
    <div class="coupons-list">
        <div class="row">
            {{-- item --}}
            @foreach($couponsList as $c)
                <?php
                $aff_url = !empty($c->product_link) ? $c->product_link : ( !empty($c->affiliate_url) ? $c->affiliate_url : $c->store_url );
                ?>
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="coupons-border-box">
                    <div class="coupons-logo">
                        <img src="https://res.cloudinary.com/bbbd/image/fetch/w_68/v1542084333/{{ $c->logo }}" alt="{{ $c->name }}" />
                    </div>
                    <div class="coupons-content">
                        <div class="coupons-top">
                            <div>
                                <span class="cp-store-name">{{ $c->name }}</span>
                                @if(!empty($c->code))<span class="cp-type">CODE</span>@endif
                            </div>
                        </div>
                        <div class="coupons-body">
                            <div>
                                <strong>{{ $c->title }}</strong>
                            </div>
                            {{ !empty($c->description)?$c->description : $c->short_description }}
                        </div>
                        <div class="coupons-footer">
                            <div class="go-btn bottom_code code_reset bottom_re">
                                @if(!empty($c->code))
                                <a rel="nofollow noopener" title="Coupon code" class="btn btn-go get-code coupon_button coupon_button_cover"  data-goid="{{ $c->go }}" data-aff="{{ $aff_url }}">
                                    <span class="giv2-text">Get Code</span>
                                    <span class="giv2-code">{{ $c->code }}</span>
                                    <span class="giv2-cover"></span>
                                    <span class="giv2-image"></span>
                                </a>
                                @else
                                <a rel="nofollow noopener" title="Get deals" class="btn btn-go get-deal coupons-getdeal"  data-goid="{{ $c->go }}" data-aff="{{ $aff_url }}">
                                    <span class="giv2-text">Get Deals</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- end item --}}
        </div>
    </div>
</div>
{{--BEST DEALS--}}
<div class="best-deals">
    <div class="best-deals-title">
        <h1>Today's Best Deals</h1>
    </div>
    <div class="deals-list">
        {{-- item --}}
        @foreach(range(0,11) as $v)
            <div class="deals-item">
                <div class="deals-item-wrap">
                    <div class="deals-img">
                        <img src="https://s3-eu-west-1.amazonaws.com/img.frmoda.com/scarpe/hogan/hxw0/HXW052016875SQER49blu-01.jpg" />
                    </div>
                    <div class="deals-from">
                        From <b>FRMODA</b>
                    </div>
                    <div class="deals-desc">
                        Women's shoes leather trainers sneakers olympia h flock asda sd asd asd asd as eather trainers sneakers olympia h flock asda sd asd asd asd as
                    </div>
                    <div class="deals-price">
                        $158.2
                    </div>
                    <div class="deals-button">
                        <button class="btn btn-default">Shop now</button>
                    </div>
                </div>
            </div>

        @endforeach
        {{-- end item --}}
    </div>
</div>
{{--Blogs--}}
<div class="blog-news">
    <div class="blog-top-title">
        <h1>Latest Blog Posts</h1>
    </div>
    <div class="blog-list">
        {{-- item --}}
        @foreach(range(0,11) as $v)
            <div class="blog-item">
                <a href="">
                <div class="blog-item-wrap">
                    <div class="blog-img">
                        <img src="https://www.hotdeals.com/blog/wp-content/uploads/2019/06/Why-You-Should-Patronize-Squeezed-Online-for-Juice-Cleanser.jpg"/>
                    </div>
                    <div class="blog-item-title">
                        <h4>Why You Should Patronize Squeezed </h4>
                    </div>
                    <div class="blog-item-desc">
                        Squeezed Online is one of the best places to get top quality products and services. This outlet is one of the best places to patronize for various products like Juice Cleans
                    </div>
                </div>
                </a>
            </div>
        @endforeach
        {{-- end item --}}
    </div>
</div>


{{-- popular store--}}
<div class="popular-store">
    <div class="wrap-popular-store">
        <h1>Popular Stores:</h1>
        <div class="row">
            @foreach ($popularStores as $s)
            <div class="col-g col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('store-detail', ['alias' => $s->alias] ) }}" title="{{ $s->name }}">{{ str_limit($s->name.' '. $s->custom_keywords, 20) }}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop

@section('scriptDevMod')
@parent
	<script src="{{ asset('/js/all/mix-libs.js') }}"></script>
	<script src="{{ asset('/js/app-footer.min.js') }}"></script>
  	<script src="{{ asset('/js/copy.min.js') }}"></script>
	<script src="{{ asset('/js/src/glide/jquery.glide.min.js') }}"></script>
	<script src="{{ asset('/js/src/owl/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/js/run-slider.min.js') }}"></script>
@stop
@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/home/mix-footer.js')) }}"></script>
@stop