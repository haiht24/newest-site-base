
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/home/mix.css')) }}" media="all,handheld"/>
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
            @foreach([1,2,3,4,5,6] as $v)
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="coupons-border-box">
                    <div class="coupons-logo">
                        <img src="https://www.hotdeals.com/public/images/termnew/201906/5d00b57f9950a.png" />
                    </div>
                    <div class="coupons-content">
                        <div class="coupons-top">
                            <div>
                                <span class="cp-store-name">store name</span>
                                <span class="cp-type">code</span>
                            </div>
                        </div>
                        <div class="coupons-body">
                            <div>
                                <strong>Coupon title content</strong>
                            </div>
                            content coupon asdasdalksd asdlkjas ljadslk content coupon asdasdalksd asdlkjas ljadslk content coupon asdasdalksd asdlkjas ljadslk content coupon asdasdalksd asdlkjas ljadslk
                        </div>
                        <div class="coupons-footer">
                            <div class="bottom_code code_reset bottom_re">
                                @if(rand(0,1)==1)
                                <a href="" rel="nofollow noopener" class="btn btn-go coupons-click coupon_button coupon_button_cover">
                                    <span class="giv2-text">Get Code</span>
                                    <span class="giv2-code">15</span>
                                    <span class="giv2-cover"></span>
                                    <span class="giv2-image"></span>
                                </a>
                                @else
                                <a href="" rel="nofollow noopener" class="btn btn-go coupons-click coupons-getdeal">
                                    <span class="giv2-text">Get Code</span>
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
            @foreach(range(0,12) as $v)
                <div class="col-g col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="">Bunion Sleeve</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@stop


@section('scriptMix')
    @parent {{--
    <script src="{{asset('js/src/glide/jquery.glide.min.js')}}"></script>
    <script src="{{asset('js/src/owl/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('/js/run-slider.min.js') }}"></script>
--}}
    <script src="{{ asset(mix('/js/home/mix-footer.js')) }}"></script>
@stop