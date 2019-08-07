
@section('cssDevMod')
@parent
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/src/libs/bootstrap.3.3.7.min.css') }}" media="all,handheld"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/detail.min.css') }}" media="all,handheld"/>
@stop
@section('cssMix')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/mix-detail.css')) }}" media="all,handheld"/>
@stop
@section('head')
@parent
<link rel="canonical" href="{{ route('store-detail', ['alias'=>$store->alias]) }}">
@stop
@extends('app')

@section('content')
    @parent
    <ul class="breadcrumb">
        <li><a href="{{ url('/') }}" title="Home page {{ $_SERVER['HTTP_HOST'] }}">Home</a></li>
        <li><a href="{{ url('/category') }}" title="all categories">categories</a></li>
        <li class="active">{{ $store->name }}</li>
    </ul>
    <div class="info">
        <div class="info-item info-image">
            <a href="{{ ( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url ) }}" title="{{ $store->name }} link store">
            <div class="info-wrap">
                <img src="{{ $store->logo }}" alt="logo {{ $store->name }}"/>
            </div>
            </a>
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
            <div class="info-go-wrap">
                <div class="info-button">
                    <a target="_blank" href="{{ ( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url ) }}" title="{{ $store->name }} link store">
                    <button class="btn btn-info">
                        GO TO {{ strtoupper(str_limit($store->name, 12)) }}
                    </button>
                    </a>
                </div>
                <div class="socials-share">
                    <a class="icon-share fb-icon">
                        <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25"><defs></defs><path d="M758.88 43.424C743.424 41.152 690.304 36.576 628.576 36.576 499.424 36.576 410.88 115.424 410.88 260L410.88 384.576 265.152 384.576 265.152 553.728 410.88 553.728 410.88 987.424 585.728 987.424 585.728 553.728 730.88 553.728 753.152 384.576 585.728 384.576 585.728 276.576C585.728 228 598.88 194.304 669.152 194.304L758.88 194.304 758.88 43.424Z" fill="#ffffff"></path></svg>
                    </a>
                    <a class="icon-share twiter-icon">
                        <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25"><defs></defs><path d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z" fill="#ffffff"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--Box show --}}
    <div class="box-show">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="filter-box" data-url="{{ route('store-filter') }}?alias={{ $store->alias }}">
                <button class="btn-type btn btn-all">All</button>
                @foreach($couponsType as $title => $type)
                    <?php $activeType = $ssType?in_array($type, $ssType):''; ?>
                     <button class="btn-type btn{{ $activeType?' btn-active':' btn-none' }}" data-type="{{ $type }}">{{ $title }}</button>
                @endforeach
            </div>
            <div class="box-list" id="coupons-list">
                {{--item--}}
                @foreach($store->coupons as $c)
					@include('elements.coupons_item')
                @endforeach
                {{--end item--}}
            </div>

            <div id="show-more" class="show-more" data-url="{{ route('store-detail-more',['storeId'=>$store->id,'offset'=>'']) }}">
                <button class="btn btn-success">SHOW MORE...</button>
            </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

            @if(!empty($store->short_description))
            <div class="side-bar-right">
                <div class="wrap-side-bar">
                    <h3>About {{$store->name }}</h3>
                    {!!html_entity_decode($store->short_description)!!}
                </div>
            </div>
            @endif

            @if(!empty($childStores))
                <div class="side-bar-right">
                    <div class="wrap-side-bar">
                        <h3 class="box-header">
                            Related stores
                        </h3>
                        <div>
                            <ul class="list-related" id="style-2">
                                @foreach($childStores as $s)
                                    <li><a class="filter-item" href="{{ route('store-detail', ['alias'=>$s->alias]) }}" title="{{ $s->name }} coupons, deals">{{ $s->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
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

@section('scriptDevMod')
@parent
<script src="{{ asset('/js/all/mix-libs.js') }}"></script>
<script src="{{ asset('/js/app-footer.min.js') }}"></script>
<script src="{{ asset('/js/modules/store-detail/index.min.js') }}"></script>
<script src="{{ asset('/js/copy.min.js') }}"></script>
@stop
@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/detail/mix-footer.js')) }}"></script>
@stop
