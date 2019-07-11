
@section('cssDevMod')
@parent
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/src/libs/bootstrap.3.3.7.min.css') }}" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/detail.min.css') }}" media="all,handheld"/>
@stop
@section('cssMix')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/mix-detail.css')) }}" media="all,handheld"/>
@stop

@extends('app')

@section('content')
    @parent
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">category</a></li>
        <li class="active">Coupons title</li>
    </ul>
    <div class="info">
        <div class="info-item info-image">
            <div class="info-wrap">
                <img src="{{ $store->logo }}" alt="logo {{ $store->name }}"/>
            </div>
        </div>
        <div class="info-item info-content">
            <div class="info-content-title">
                <h1>{{ $store->name_keyword }}</h1>
            </div>
            <div class="info-content-desc">
                {{ $store->head_description }}
            </div>
        </div>
        <div class="info-item info-go">
            <div class="info-button">
                <button class="btn btn-info">
                    GO TO RICHBROOK...
                </button>
            </div>
        </div>
    </div>
    {{--Box show --}}
    <div class="box-show">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="filter-box">
                <button class="btn btn-active">All</button>
                <button class="btn">Code</button>
                <button class="btn">Deals</button>
            </div>
            <div class="box-list">
                {{--item--}}
                @foreach($store->coupons as $c)
                <div class="box-item">
                    <div class="box-item-wrap">
                        <div class="box-item-img">
                            <div class="box-img-wrap">
                                @if($c->discount != '' && $c->discount == 100 && $c->currency == '%')
                                    <p class="box-text-top">Free</p>
                                @elseif($c->discount != '' && $c->discount > 0)
                                    <p class="box-text-top">{{ $c->discount }}<span>{{ $c->currency }}</span></p>
                                    <p class="box-text-type">Discount</p>
                                @else
                                    @if (strtolower($c->type) === 'free shipping')
                                        <p class="box-text-top">Free</p>
                                        <p class="box-text-type">Shipping</p>
                                    @else
                                        <p class="box-text-top">Great</strong>
                                        <p class="box-text-type">Offer</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="box-item-body">
                            <div class="box-item-body-content">
                                <div class="box-item-title">
                                    <h2>{{ $c->title }}</h2>
                                </div>
                                <div class="box-item-desc">
                                    {{ $c->description }}
                                </div>
                                @if(!empty($c->expire_date))
                                <div class="box-item-expire">
                                        {{ $c->expire_date }}
                                </div>
                                @else
                                @endif
                            </div>
                            <div class="box-item-btn">
                                <div class="go-btn box-item-btn-wrap">
                                    @if(strtolower($c->type) !== 'coupon code')
                                    <button class="get-deal btn btn-info" data-id="{{ $c->go }}">
                                        Click to save
                                    </button>
                                    @else
                                    <button class="get-code btn btn-danger" data-id="{{ $c->go }}">
                                        <div class="wrap-btn-show">
                                            <div class="text-code">
                                                {{ substr($c->code, -3, 3) }}
                                            </div>
                                            <div class="text-btn">
                                                Coupons code
                                            </div>
                                            <span class="code-cover"></span>
                                            <div class="code-text-image"></div>
                                        </div>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{--end item--}}
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="side-bar-right">
                <div class="wrap-side-bar">
                    <h2>About Richbrook</h2>
                    Richbrook provides high-quality products that can help make your life better. There are many ways to save money when you shop on the Richbrook:
                    Sign up allows users to avail newsletters and regular updates of Richbrook Discount Code and discounts and offers at Richbrook.
                    Richbrook offers flat 15% OFF discount on all orders for a limited period by using Richbrook Discount Code.
                    Customers can purchase Richbrook items and save a lot.
                    On all orders, the company guarantee free shipping.
                </div>
            </div>
        </div>

    </div>
    </div>
    {{-- end box show --}}

{{--desciption info --}}
<div class="about-this">
    <h1>About Richbrook</h1>
    Purchase at Richbrook and save up to 15% OFF on your order with the latest Richbrook Discount Code, Vouchers and sales. There are Richbrook Promo Codes and deals for June 2019. Act now and never miss Richbrook special offers.

    <h4>How to use a Richbrook Special Offer?</h4>
    Find what you like at richbrook.co.uk site, and put them into the cart at first.

    Check for Richbrook Vouchers and Promo Codes at hotdeals.com. Try the code at the page which correctly meet your requirement.
    Go back to richbrook.co.uk and proceed to checkout.And add the code you copied at hotdeals.com. Then click "check out" button.
    You can save a lot with Richbrook Discount Code online.
    Avail all the latest Richbrook Discount Code and discount offers and enjoy up to 15% OFF when you shop at richbrook.co.uk. HotDeals is regularly updated with the list of coupons, deals, discounts added on a regular basis. To apply the promo code or deal at check out for extra savings.

</div>

@stop

@section('scriptsDevMod')
@parent
<script src="{{ asset('public/js/all/mix-libs.js') }}"></script>
<script src="{{ asset('public/js/app-footer.min.js') }}"></script>
<script src="{{ asset('/js/modules/store-detail/index.min.js') }}"></script>
<script src="{{ asset('/js/copy.min.js') }}"></script>
@stop
@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/detail/mix-footer.js')) }}"></script>
@stop

@section('addfooter')
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <!-- Modal -->
    <div class="store-modal">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Coupons title detail</h4>
                </div>
                <div class="modal-body">
                    <div class="store-img">
                        <img src="https://s3-ap-southeast-1.amazonaws.com/mccorp-co-com/perfectmatch-coupons-logo-png" />
                    </div>
                    <div class="store-copy">
                        <div class="wrap-copy">
                            <div class="input-copied">Copied !!!</div>
                            <input type="text" id="select-copy" value="CODE123" readonly="1">
                            <button class="btn btn-copy my_clip_button" id="btn-copy" title="Click me to copy to clipboard." data-clipboard-target="select-copy" data-clipboard-text="Failed copy">Copy Code</button>
                        </div>
                    </div>
                    <p>Some text in the modal.</p>
                </div>
            </div>

        </div>
    </div>
    </div>

@stop